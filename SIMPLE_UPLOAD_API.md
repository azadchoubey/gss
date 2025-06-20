# Case Pictures Upload API

Simple API for uploading case pictures from mobile app and saving the image count in the database.

## Authentication

Use Laravel Sanctum Bearer token:
```
Authorization: Bearer your_token_here
```

Only users with 'Fo' (Field Officer) role can access this endpoint.

## Upload Case Pictures

**Endpoint:** `POST /api/mobile/cases/upload-pictures`

**Description:** Upload multiple images for a case and automatically update the total image count in the database.

### Request

**Content-Type:** `multipart/form-data`

**Parameters:**
- `case_id` (required): Integer - ID of the case
- `case_images` (required): Array of image files

**File Validation:**
- Formats: jpeg, jpg, png, gif
- Max size: 10MB per image
- Minimum: 1 image required

### Response

**Success (200):**
```json
{
    "success": true,
    "message": "Images uploaded successfully",
    "data": {
        "case_id": 123,
        "uploaded_count": 3,
        "total_images": 5,
        "failed_uploads": []
    }
}
```

**Error (422):**
```json
{
    "errors": {
        "case_id": ["The case id field is required."],
        "case_images": ["The case images field is required."]
    }
}
```

**Error (403):**
```json
{
    "message": "Unauthorized"
}
```

**Error (404):**
```json
{
    "message": "Case not found or not assigned to you"
}
```

## Database Changes

- Added `image_count` column to `cases` table
- Automatically updated after each upload
- Stores total number of images for the case

## File Storage

Images are stored in: `storage/app/public/YYYY/Month/DD/case_id/images/`

Example: `storage/app/public/2025/June/19/123/images/photo1.jpg`

## Usage Example

```bash
curl -X POST \
  -H "Authorization: Bearer your_token_here" \
  -F "case_id=123" \
  -F "case_images[]=@photo1.jpg" \
  -F "case_images[]=@photo2.jpg" \
  http://your-domain.com/api/mobile/cases/upload-pictures
```

## Features

✅ **Simple Upload**: Just send images and case ID  
✅ **Auto Count**: Database automatically updated with total image count  
✅ **Duplicate Handling**: Automatic filename conflict resolution  
✅ **Security**: Only assigned FO can upload to their cases  
✅ **Validation**: File type and size validation  
✅ **Error Handling**: Detailed error responses  
✅ **Logging**: All operations logged for debugging  

That's it! No complex management needed - just upload and the count is automatically saved to the database.
