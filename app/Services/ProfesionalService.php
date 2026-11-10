<?php

namespace App\Services;

use App\Repositories\ProfesionalRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class ProfesionalService
{
    private ProfesionalRepository $profesionalrepository;

    public function __construct(ProfesionalRepository $profesionalrepository)
    {
        $this->profesionalrepository = $profesionalrepository;
    }

    public function listartodo()
    {
        return $this->profesionalrepository->listartodo();
    }

    public function guardar(array $datos)
    {
        return DB::transaction(function () use ($datos) {

            // Comprobar que exista el rol profesional
            $rol = Role::where('name', 'profesional')
                ->where('guard_name', config('seguridad.guard'))
                ->firstOrFail();

            // Crear la cuenta de acceso
            $usuario = User::create([
                'name' => $datos['nombre_profesional'] . ' ' . $datos['apellido_profesional'],
                'email' => $datos['correo'],
                'password' => $datos['password'],
            ]);

            // Asignar el rol
            $usuario->assignRole($rol);

            // Preparar los datos del profesional
            unset($datos['password'], $datos['password_confirmation']);

            $datos['id_user'] = $usuario->id;

            // Guardar el profesional relacionado con su cuenta
            return $this->profesionalrepository->guardar($datos);
        });
    }

    public function eliminar(int $id)
    {
        return $this->profesionalrepository->eliminar($id);
    }

    public function edit(int $id)
    {
        return $this->profesionalrepository->edit($id);
    }

    public function actualizar(int $id, array $datos)
    {
        return $this->profesionalrepository->actualizar($id, $datos);
    }
}
