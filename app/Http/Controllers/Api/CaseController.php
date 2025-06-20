<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CaseModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CaseController extends Controller
{
    // API: Get today's accepted cases for the authenticated FO
    public function todayAcceptedCases(Request $request)
    {
        $user = $request->user();
        if (!$user->role || $user->role->role_name !== 'Fo') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $today = now()->toDateString();
        $cases = CaseModel::with([
            'companies:id,Company_name',
            'c_branch:id,branch_name',
            'vehicle_cat:id,vehicle_type',
            'manufacturers:id,manufacturer_name',
            'casetypes:id,case_type',
            'fo:id,name'
        ])
        ->where('fo_id', $user->id)
        ->where('is_deleted', 0)
        ->where('is_accepted', 1)
        ->where('imgstatus', 0) 
        ->whereDate('inspection_date', $today)
        ->select([
            'id', 'company_name', 'company_branch',
            'customer_name', 'customer_address', 'customer_no', 'inspection_address', 'vehicle_no', 'chassis_no',
            'engine_no', 'vehicle_category', 'vehicle_manufacturer', 'year',
            'vehicle_variant', 'case_type',
            'fo_id', 'inspection_date','is_deleted', 'is_accepted'
        ])
        ->get()
        ->map(function($case) {
            return [
                'id' => $case->id,
                'company_name' => [
                    'id' => $case->company_name,
                    'value' => $case->companies ? $case->companies->Company_name : null
                ],
                'company_branch' => [
                    'id' => $case->company_branch,
                    'value' => $case->c_branch ? $case->c_branch->branch_name : null
                ],
                'customer_name' => $case->customer_name,
                'customer_address' => $case->customer_address,
                'customer_no' => $case->customer_no,
                'inspection_address' => $case->inspection_address,
                'vehicle_no' => $case->vehicle_no,
                'chassis_no' => $case->chassis_no,
                'engine_no' => $case->engine_no,
                'vehicle_category' => [
                    'id' => $case->vehicle_category,
                    'value' => $case->vehicle_cat ? $case->vehicle_cat->vehicle_type : null
                ],
                'vehicle_manufacturer' => [
                    'id' => $case->vehicle_manufacturer,
                    'value' => $case->manufacturers ? $case->manufacturers->manufacturer_name : null
                ],
                'year' => $case->year,
                'vehicle_variant' => $case->vehicle_variant,
                'case_type' => [
                    'id' => $case->case_type,
                    'value' => $case->casetypes ? $case->casetypes->case_type : null
                ],
                'fo_id' => [
                    'id' => $case->fo_id,
                    'value' => $case->fo ? $case->fo->name : null
                ],
                'inspection_date' => $case->inspection_date,
                'is_deleted' => $case->is_deleted,
                'is_accepted' => $case->is_accepted,
                'imgstatus' => $case->imgstatus,
                'submitted_at' => $case->submitted_at
            ];
        });
        return response()->json(['cases' => $cases]);
    }

    // API: Get upcoming inspections (not accepted) for the authenticated FO
    public function upcomingInspections(Request $request)
    {
        $user = $request->user();
        if (!$user->role || $user->role->role_name !== 'Fo') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $today = now()->toDateString();
        $cases = CaseModel::with([
            'companies:id,Company_name',
            'c_branch:id,branch_name',
            'vehicle_cat:id,vehicle_type',
            'manufacturers:id,manufacturer_name',
            'casetypes:id,case_type',
            'fo:id,name'
        ])
        ->where('fo_id', $user->id)
        ->where('is_deleted', 0)
        ->where('is_accepted', 0)
        ->where(function($q) {
            $q->whereNull('inspection_status')->orWhere('inspection_status', '!=', 1);
        })
        ->select([
            'id', 'company_name', 'company_branch',
            'customer_name', 'customer_address', 'customer_no', 'inspection_address', 'vehicle_no', 'chassis_no',
            'engine_no', 'vehicle_category', 'vehicle_manufacturer', 'year',
            'vehicle_variant', 'case_type',
            'fo_id', 'inspection_date','is_deleted', 'is_accepted'
        ])
        ->get()
        ->map(function($case) {
            return [
                'id' => $case->id,
                'company_name' => [
                    'id' => $case->company_name,
                    'value' => $case->companies ? $case->companies->Company_name : null
                ],
                'company_branch' => [
                    'id' => $case->company_branch,
                    'value' => $case->c_branch ? $case->c_branch->branch_name : null
                ],
                'customer_name' => $case->customer_name,
                'customer_address' => $case->customer_address,
                'customer_no' => $case->customer_no,
                'inspection_address' => $case->inspection_address,
                'vehicle_no' => $case->vehicle_no,
                'chassis_no' => $case->chassis_no,
                'engine_no' => $case->engine_no,
                'vehicle_category' => [
                    'id' => $case->vehicle_category,
                    'value' => $case->vehicle_cat ? $case->vehicle_cat->vehicle_type : null
                ],
                'vehicle_manufacturer' => [
                    'id' => $case->vehicle_manufacturer,
                    'value' => $case->manufacturers ? $case->manufacturers->manufacturer_name : null
                ],
                'year' => $case->year,
                'vehicle_variant' => $case->vehicle_variant,
                'case_type' => [
                    'id' => $case->case_type,
                    'value' => $case->casetypes ? $case->casetypes->case_type : null
                ],
                'fo_id' => [
                    'id' => $case->fo_id,
                    'value' => $case->fo ? $case->fo->name : null
                ],
                'inspection_date' => $case->inspection_date,
                'is_deleted' => $case->is_deleted,
                'is_accepted' => $case->is_accepted,
            ];
        });
        return response()->json(['cases' => $cases]);
    }

    // API: Get completed cases for the authenticated FO (imgstatus = 1)
    public function completedCases(Request $request)
    {
        $user = $request->user();
        if (!$user->role || $user->role->role_name !== 'Fo') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $cases = CaseModel::with([
            'companies:id,Company_name',
            'c_branch:id,branch_name',
            'vehicle_cat:id,vehicle_type',
            'manufacturers:id,manufacturer_name',
            'casetypes:id,case_type',
            'fo:id,name'
        ])
        ->where('fo_id', $user->id)
        ->where('is_deleted', 0)
        ->where('imgstatus', 1)
        ->select([
            'id', 'company_name', 'company_branch',
            'customer_name', 'customer_address', 'customer_no', 'inspection_address', 'vehicle_no', 'chassis_no',
            'engine_no', 'vehicle_category', 'vehicle_manufacturer', 'year',
            'vehicle_variant', 'case_type',
            'fo_id', 'inspection_date','is_deleted', 'is_accepted', 'imgstatus'
        ])
        ->get()
        ->map(function($case) {
            return [
                'id' => $case->id,
                'company_name' => [
                    'id' => $case->company_name,
                    'value' => $case->companies ? $case->companies->Company_name : null
                ],
                'company_branch' => [
                    'id' => $case->company_branch,
                    'value' => $case->c_branch ? $case->c_branch->branch_name : null
                ],
                'customer_name' => $case->customer_name,
                'customer_address' => $case->customer_address,
                'customer_no' => $case->customer_no,
                'inspection_address' => $case->inspection_address,
                'vehicle_no' => $case->vehicle_no,
                'chassis_no' => $case->chassis_no,
                'engine_no' => $case->engine_no,
                'vehicle_category' => [
                    'id' => $case->vehicle_category,
                    'value' => $case->vehicle_cat ? $case->vehicle_cat->vehicle_type : null
                ],
                'vehicle_manufacturer' => [
                    'id' => $case->vehicle_manufacturer,
                    'value' => $case->manufacturers ? $case->manufacturers->manufacturer_name : null
                ],
                'year' => $case->year,
                'vehicle_variant' => $case->vehicle_variant,
                'case_type' => [
                    'id' => $case->case_type,
                    'value' => $case->casetypes ? $case->casetypes->case_type : null
                ],
                'fo_id' => [
                    'id' => $case->fo_id,
                    'value' => $case->fo ? $case->fo->name : null
                ],
                'inspection_date' => $case->inspection_date,
                'is_deleted' => $case->is_deleted,
                'is_accepted' => $case->is_accepted,
                'imgstatus' => $case->imgstatus,
            ];
        });
        return response()->json(['cases' => $cases]);
    }

    public function updateLocation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = $request->user();
   
        if (!$user->role ||$user->role->role_name !== 'Fo') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;
        $user->save();

        return response()->json(['message' => 'Location updated successfully']);
    }

    // API: Accept or Reject a case for the authenticated FO (action: 1=accept, 0=reject)
    public function acceptOrRejectCase(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'case_id' => 'required|integer|exists:cases,id',
            'action' => 'required|in:0,1', // 1=accept, 0=reject
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = $request->user();
        if (!$user->role || $user->role->role_name !== 'Fo') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $case = CaseModel::where('id', $request->case_id)
            ->where('fo_id', $user->id)
            ->where('is_deleted', 0)
            ->first();
        if (!$case) {
            return response()->json(['message' => 'Case not found or not assigned to you'], 404);
        }
        $case->is_accepted = (int)$request->action;
        $case->save();
        return response()->json([
            'message' => 'Case ' . ($case->is_accepted ? 'accepted' : 'rejected') . ' successfully',
            'case_id' => $case->id,
            'is_accepted' => $case->is_accepted
        ]);
    }

    // API: Upload case pictures and update count in database
    public function uploadCasePictures(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'case_id' => 'required|integer|exists:cases,id',
            'case_images' => 'required|array|min:1',
            'case_images.*' => 'required|file|image|mimes:jpeg,jpg,png,gif|max:10240', // Max 10MB per image
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = $request->user();
        if (!$user->role || $user->role->role_name !== 'Fo') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Find the case assigned to the authenticated FO
        $case = CaseModel::where('id', $request->case_id)
            ->where('fo_id', $user->id)
            ->where('is_deleted', 0)
            ->first();

        if (!$case) {
            return response()->json(['message' => 'Case not found or not assigned to you'], 404);
        }

        // Determine the upload directory structure
        $basePath = '';
        if ($case->images) {
            // Extract existing base path (e.g., "storage/2023/March/29/2" -> "2023/March/29/2")
            $basePath = str_replace('storage/', '', $case->images);
        } else {
            // Create new path structure: Year/Month/Day/CaseId
            $basePath = date("Y") . '/' . date("F") . '/' . date("d") . '/' . $case->id;
        }

        // Add '/images' subdirectory
        $targetDir = $basePath . '/images';
        
        $uploadedCount = 0;
        $failedUploads = [];

        try {
            // Store each uploaded image
            foreach ($request->file('case_images') as $index => $image) {
                if ($image->isValid()) {
                    $fileName = $image->getClientOriginalName();
                    
                    // Generate unique filename if file already exists
                    $counter = 1;
                    $originalName = pathinfo($fileName, PATHINFO_FILENAME);
                    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
                    
                    while (Storage::exists('public/' . $targetDir . '/' . $fileName)) {
                        $fileName = $originalName . '_' . $counter . '.' . $extension;
                        $counter++;
                    }

                    try {
                        // Store the file using Laravel's storage system
                        $stored = $image->storeAs($targetDir, $fileName, 'public');
                        
                        if ($stored) {
                            $uploadedCount++;
                            Log::info("Successfully uploaded: {$fileName} to {$targetDir}");
                        }
                    } catch (\Exception $e) {
                        $failedUploads[] = [
                            'file' => $image->getClientOriginalName(),
                            'error' => $e->getMessage()
                        ];
                        Log::error("Failed to upload {$fileName}: " . $e->getMessage());
                    }
                } else {
                    $failedUploads[] = [
                        'file' => 'Invalid file at index ' . $index,
                        'error' => 'File is not valid'
                    ];
                }
            }

            // Update case with image path and count in database
            if ($uploadedCount > 0) {
                // Update the images path if it wasn't set before
                if (!$case->images) {
                    $case->images = 'storage/' . $basePath;
                }
                
                // Count total images in directory and save to database
                $imagesPath = $targetDir;
                $totalImages = Storage::disk('public')->files($imagesPath);
                $totalImages = count(array_filter($totalImages, function($file) {
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    return in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                }));
                $case->image_count = $totalImages;
                
                $case->save();

                Log::info("Image upload completed for case {$case->id}: {$uploadedCount} files uploaded. Total images: {$totalImages}");
            }

            return response()->json([
                'success' => true,
                'message' => 'Images uploaded successfully',
                'data' => [
                    'case_id' => $case->id,
                    'uploaded_count' => $uploadedCount,
                    'total_images' => $case->image_count ?? 0,
                    'failed_uploads' => $failedUploads
                ]
            ]);

        } catch (\Exception $e) {
            Log::error("Error uploading images for case {$case->id}: " . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload images',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // API: Submit case from mobile app
    public function submitCase(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'case_id' => 'required|integer|exists:cases,id',
            'submitted_vehicle_no' => 'required|string|max:255',
            'fo_remarks' => 'required|string|max:1000',
            'total_img_count' => 'required|integer|min:0',
            'inspection_lat' => 'required|numeric|between:-90,90',
            'inspection_long' => 'required|numeric|between:-180,180',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = $request->user();
        if (!$user->role || $user->role->role_name !== 'Fo') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Find the case assigned to the authenticated FO
        $case = CaseModel::where('id', $request->case_id)
            ->where('fo_id', $user->id)
            ->where('is_deleted', 0)
            ->where('is_accepted', 1) // Only accepted cases can be submitted
            ->first();

        if (!$case) {
            return response()->json(['message' => 'Case not found, not assigned to you, or not accepted'], 404);
        }

        // Check if case is already submitted
        if ($case->imgstatus == 1) {
            return response()->json(['message' => 'Case has already been submitted'], 400);
        }

        try {
            // Update case with submission data
            $case->submitted_vehicle_no = $request->submitted_vehicle_no;
            $case->fo_remarks = $request->fo_remarks;
            $case->total_img_count = $request->total_img_count;
            $case->inspection_lat = $request->inspection_lat;
            $case->inspection_long = $request->inspection_long;
            $case->imgstatus = 1; // Mark as submitted
            $case->submitted_at = now(); // Add timestamp for submission
            
            $case->save();

            Log::info("Case {$case->id} submitted by FO {$user->id} with {$request->total_img_count} images at location ({$request->inspection_lat}, {$request->inspection_long})");

            // Reload case with relationships for consistent response format
            $case = CaseModel::with([
                'companies:id,Company_name',
                'c_branch:id,branch_name',
                'vehicle_cat:id,vehicle_type',
                'manufacturers:id,manufacturer_name',
                'casetypes:id,case_type',
                'fo:id,name'
            ])->find($case->id);

            $caseData = [
                'id' => $case->id,
                'company_name' => [
                    'id' => $case->company_name,
                    'value' => $case->companies ? $case->companies->Company_name : null
                ],
                'company_branch' => [
                    'id' => $case->company_branch,
                    'value' => $case->c_branch ? $case->c_branch->branch_name : null
                ],
                'customer_name' => $case->customer_name,
                'customer_address' => $case->customer_address,
                'customer_no' => $case->customer_no,
                'inspection_address' => $case->inspection_address,
                'vehicle_no' => $case->vehicle_no,
                'chassis_no' => $case->chassis_no,
                'engine_no' => $case->engine_no,
                'vehicle_category' => [
                    'id' => $case->vehicle_category,
                    'value' => $case->vehicle_cat ? $case->vehicle_cat->vehicle_type : null
                ],
                'vehicle_manufacturer' => [
                    'id' => $case->vehicle_manufacturer,
                    'value' => $case->manufacturers ? $case->manufacturers->manufacturer_name : null
                ],
                'year' => $case->year,
                'vehicle_variant' => $case->vehicle_variant,
                'case_type' => [
                    'id' => $case->case_type,
                    'value' => $case->casetypes ? $case->casetypes->case_type : null
                ],
                'fo_id' => [
                    'id' => $case->fo_id,
                    'value' => $case->fo ? $case->fo->name : null
                ],
                'inspection_date' => $case->inspection_date,
                'is_deleted' => $case->is_deleted,
                'is_accepted' => $case->is_accepted,
                'imgstatus' => $case->imgstatus,
                'submitted_at' => $case->submitted_at
            ];

            return response()->json(['cases' => [$caseData]]);

        } catch (\Exception $e) {
            Log::error("Error submitting case {$request->case_id}: " . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit case',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}