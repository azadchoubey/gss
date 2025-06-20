# Submit Case API Documentation

API endpoint for submitting case inspection from mobile app.

## Endpoint

**POST** `/api/mobile/cases/submit`

## Authentication

Requires Laravel Sanctum Bearer token and FO (Field Officer) role:
```
Authorization: Bearer your_token_here
```

## Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| case_id | integer | Yes | ID of the case to submit |
| submitted_vehicle_no | string | Yes | Vehicle number as verified during inspection (max 255 chars) |
| fo_remarks | string | Yes | Field Officer's remarks/notes about the inspection (max 1000 chars) |
| total_img_count | integer | Yes | Total number of images captured (minimum 0) |
| inspection_lat | decimal | Yes | Latitude of inspection location (-90 to 90) |
| inspection_long | decimal | Yes | Longitude of inspection location (-180 to 180) |

## Request Example

```json
{
    "case_id": 123,
    "submitted_vehicle_no": "MH12AB1234",
    "fo_remarks": "Vehicle inspected thoroughly. Minor scratches on rear bumper. All documents verified.",
    "total_img_count": 15,
    "inspection_lat": 19.0760,
    "inspection_long": 72.8777
}
```

## Success Response (200)

```json
{
    "success": true,
    "message": "Case submitted successfully",
    "data": {
        "case_id": 123,
        "submitted_vehicle_no": "MH12AB1234",
        "fo_remarks": "Vehicle inspected thoroughly. Minor scratches on rear bumper. All documents verified.",
        "total_img_count": 15,
        "inspection_location": {
            "latitude": 19.0760,
            "longitude": 72.8777
        },
        "imgstatus": 1,
        "submitted_at": "2025-06-19T08:30:45.000000Z"
    }
}
```

## Error Responses

### Validation Error (422)
```json
{
    "errors": {
        "case_id": ["The case id field is required."],
        "submitted_vehicle_no": ["The submitted vehicle no field is required."],
        "fo_remarks": ["The fo remarks field is required."],
        "total_img_count": ["The total img count must be at least 0."],
        "inspection_lat": ["The inspection lat must be between -90 and 90."],
        "inspection_long": ["The inspection long must be between -180 and 180."]
    }
}
```

### Unauthorized (403)
```json
{
    "message": "Unauthorized"
}
```

### Case Not Found (404)
```json
{
    "message": "Case not found, not assigned to you, or not accepted"
}
```

### Already Submitted (400)
```json
{
    "message": "Case has already been submitted"
}
```

### Server Error (500)
```json
{
    "success": false,
    "message": "Failed to submit case",
    "error": "Internal server error message"
}
```

## Business Logic

1. **Authorization**: Only the FO assigned to the case can submit it
2. **Case Status**: Only accepted cases (is_accepted = 1) can be submitted
3. **Duplicate Prevention**: Cases already submitted (imgstatus = 1) cannot be resubmitted
4. **Database Updates**: 
   - Sets `imgstatus = 1` (marks as submitted)
   - Saves all inspection data
   - Records submission timestamp

## Database Changes

The following fields are added/updated in the `cases` table:

- `submitted_vehicle_no` - Vehicle number verified during inspection
- `fo_remarks` - Field officer's inspection remarks
- `total_img_count` - Total number of images captured
- `inspection_lat` - Inspection location latitude
- `inspection_long` - Inspection location longitude  
- `submitted_at` - Timestamp when case was submitted
- `imgstatus` - Set to 1 (submitted status)

## Usage with cURL

```bash
curl -X POST \
  -H "Authorization: Bearer your_token_here" \
  -H "Content-Type: application/json" \
  -d '{
    "case_id": 123,
    "submitted_vehicle_no": "MH12AB1234",
    "fo_remarks": "Vehicle inspected thoroughly. All documents verified.",
    "total_img_count": 15,
    "inspection_lat": 19.0760,
    "inspection_long": 72.8777
  }' \
  http://your-domain.com/api/mobile/cases/submit
```

## Workflow

1. FO accepts a case via `/cases/accept-reject`
2. FO uploads images via `/cases/upload-pictures`
3. FO completes inspection and submits case via `/cases/submit`
4. Case status changes to submitted (imgstatus = 1)
5. Case appears in completed cases list

## Notes

- Vehicle number can be different from original if corrected during inspection
- Remarks field allows detailed inspection notes
- Location is captured for audit/verification purposes
- Image count helps validate uploaded vs. reported images
- Once submitted, case cannot be modified by FO
