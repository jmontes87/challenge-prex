<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AudienceLog;

class AudienceLogRepository
{
    /**
     * Registra un nuevo log de audiencia.
     *
     * @param array $data Los datos del log de audiencia a registrar.
     * @return void
     * @throws \InvalidArgumentException Si los datos proporcionados no son válidos.
     */
    public function log($data)
    {
        if (!$this->validate($data)) {
            throw new \InvalidArgumentException('Los datos proporcionados no son válidos.');
        }

        $log = new AudienceLog();

        foreach ($data as $key => $value) {
            if ($key === 'response_body' || $key === 'request_body') {
                $log->{$key} = base64_encode($value);
            } else {
                $log->{$key} = $value;
            }
        }
    
        $log->save();
    }

    public function getAll()
    {
        try {
            return AudienceLog::paginate(10);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al realizar la solicitud: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Valida los datos del log de audiencia.
     *
     * @param array $data Los datos del log de audiencia a validar.
     * @return bool True si los datos son válidos, false si no lo son.
     */
    public function validate(array $data): bool
    {
        return isset($data['user_id']) &&
               isset($data['service']) &&
               isset($data['request_body']) &&
               isset($data['response_body']) &&
               isset($data['http_status_code']);
    }

}
