<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiIntegrationLog extends Model
{
    protected $primaryKey = 'log_id';
    protected $fillable = [
        'integration_name', 'direction', 'status', 'request_url',
        'request_body', 'response_body', 'response_code',
        'duration_ms', 'error_message'
    ];
}
