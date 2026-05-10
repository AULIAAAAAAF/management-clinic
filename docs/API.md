# Klinik API Documentation

## Base URL
```
http://localhost:8000/api
```

## Endpoints

### Pasien

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/pasien` | List all pasien |
| POST | `/pasien` | Create new pasien |
| GET | `/pasien/{id}` | Get pasien by ID |
| PUT | `/pasien/{id}` | Update pasien |
| DELETE | `/pasien/{id}` | Delete pasien |

### Dokter

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/dokter` | List all dokter |
| POST | `/dokter` | Create new dokter |
| GET | `/dokter/{id}` | Get dokter by ID |
| PUT | `/dokter/{id}` | Update dokter |
| DELETE | `/dokter/{id}` | Delete dokter |

### Booking

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/booking` | List all booking |
| POST | `/booking` | Create new booking |
| GET | `/booking/{id}` | Get booking by ID |
| PUT | `/booking/{id}` | Update booking |
| DELETE | `/booking/{id}` | Delete booking |

### Antrian

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/antrian` | List all antrian |
| GET | `/antrian/{id}` | Get antrian by ID |
| PATCH | `/antrian/{id}` | Update antrian status |
| GET | `/antrian/next/{dokterId}` | Get next antrian for dokter |

---

## Request/Response Examples

### Create Booking
```
POST /api/booking
Content-Type: application/json

{
    "pasien_id": 1,
    "dokter_id": 1,
    "tanggal_booking": "2026-05-15 10:00:00",
    "keluhan": "Sakit kepala"
}
```

### Response (201)
```json
{
    "id": 1,
    "pasien_id": 1,
    "dokter_id": 1,
    "tanggal_booking": "2026-05-15 10:00:00",
    "status": "pending",
    "keluhan": "Sakit kepala",
    "antrian": {
        "id": 1,
        "nomor_antrian": 1,
        "status": "waiting"
    }
}
```

### Update Antrian Status
```
PATCH /api/antrian/1
Content-Type: application/json

{
    "status": "called"
}
```