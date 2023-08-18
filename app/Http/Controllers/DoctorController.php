<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AppointmentRequest;
use App\Models\Schedule;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::with(['persons', 'schedules', 'specialties'])->get();
        return response()->json($doctors);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($direction, $idSpecialties, $idSchedule)
    {
        $doctors = [];

        try {

            if ($direction != -1 && ($idSpecialties == -1 && $idSchedule == -1)) {
                $doctors = DB::table('doctors')
                    ->join('persons', 'persons.id', '=', 'doctors.idPerson')
                    ->join('specialties', 'specialties.id', '=', 'doctors.idSpecialty')
                    ->join('schedules', 'schedules.id', '=', 'doctors.idSchedule')
                    ->where('persons.direction', '=', $direction)
                    ->select(
                        'doctors.id as doctor_id',
                        'persons.id as idPerson',
                        'persons.name',
                        'persons.lastName',
                        'persons.birthDate',
                        'persons.direction',
                        'persons.phone',
                        'persons.typeBlood',
                        'specialties.id as idSpecialty',
                        'specialties.specialty',
                        'schedules.id as idSchedule',
                        'schedules.schedule'
                    )
                    ->get();
                return response()->json($doctors);
            } else

            if (($direction == -1 && $idSchedule == -1) && $idSpecialties != -1) {
                $doctors = DB::table('doctors')
                    ->join('persons', 'persons.id', '=', 'doctors.idPerson')
                    ->join('specialties', 'specialties.id', '=', 'doctors.idSpecialty')
                    ->join('schedules', 'schedules.id', '=', 'doctors.idSchedule')
                    ->where('doctors.idSpecialty', '=', $idSpecialties)
                    ->select(
                        'doctors.id as doctor_id',
                        'persons.id as idPerson',
                        'persons.name',
                        'persons.lastName',
                        'persons.birthDate',
                        'persons.direction',
                        'persons.phone',
                        'persons.typeBlood',
                        'specialties.id as idSpecialty',
                        'specialties.specialty',
                        'schedules.id as idSchedule',
                        'schedules.schedule'
                    )
                    ->get();
                return response()->json($doctors);
            } else

            if (($direction == -1 && $idSpecialties == -1) && $idSchedule != -1) {
                $doctors = DB::table('doctors')
                    ->join('persons', 'persons.id', '=', 'doctors.idPerson')
                    ->join('specialties', 'specialties.id', '=', 'doctors.idSpecialty')
                    ->join('schedules', 'schedules.id', '=', 'doctors.idSchedule')
                    ->where('doctors.idSchedule', '=', $idSchedule)
                    ->select(
                        'doctors.id as doctor_id',
                        'persons.id as idPerson',
                        'persons.name',
                        'persons.lastName',
                        'persons.birthDate',
                        'persons.direction',
                        'persons.phone',
                        'persons.typeBlood',
                        'specialties.id as idSpecialty',
                        'specialties.specialty',
                        'schedules.id as idSchedule',
                        'schedules.schedule'
                    )
                    ->get();
                return response()->json($doctors);
            } else


            if ($direction == -1 && ($idSpecialties != -1 && $idSchedule != -1)) {
                $doctors = DB::table('doctors')
                    ->join('persons', 'persons.id', '=', 'doctors.idPerson')
                    ->join('specialties', 'specialties.id', '=', 'doctors.idSpecialty')
                    ->join('schedules', 'schedules.id', '=', 'doctors.idSchedule')
                    ->where('doctors.idSpecialty', '=', $idSpecialties)
                    ->Where('doctors.idSchedule', '=', $idSchedule)
                    ->select(
                        'doctors.id as doctor_id',
                        'persons.id as idPerson',
                        'persons.name',
                        'persons.lastName',
                        'persons.birthDate',
                        'persons.direction',
                        'persons.phone',
                        'persons.typeBlood',
                        'specialties.id as idSpecialty',
                        'specialties.specialty',
                        'schedules.id as idSchedule',
                        'schedules.schedule'
                    )
                    ->get();

                return response()->json($doctors);
            } else


            if (($direction != -1 && $idSpecialties != -1) && $idSchedule == -1) {
                $doctors = DB::table('doctors')
                    ->join('persons', 'persons.id', '=', 'doctors.idPerson')
                    ->join('specialties', 'specialties.id', '=', 'doctors.idSpecialty')
                    ->join('schedules', 'schedules.id', '=', 'doctors.idSchedule')
                    ->where('doctors.idSpecialty', '=', $idSpecialties)
                    ->Where('persons.direction', '=', $direction)
                    ->select(
                        'doctors.id as doctor_id',
                        'persons.id as idPerson',
                        'persons.name',
                        'persons.lastName',
                        'persons.birthDate',
                        'persons.direction',
                        'persons.phone',
                        'persons.typeBlood',
                        'specialties.id as idSpecialty',
                        'specialties.specialty',
                        'schedules.id as idSchedule',
                        'schedules.schedule'
                    )
                    ->get();
                return response()->json($doctors);
            } else

            if (($direction != -1 && $idSchedule != -1) && $idSpecialties == -1) {
                $doctors = DB::table('doctors')
                    ->join('persons', 'persons.id', '=', 'doctors.idPerson')
                    ->join('specialties', 'specialties.id', '=', 'doctors.idSpecialty')
                    ->join('schedules', 'schedules.id', '=', 'doctors.idSchedule')
                    ->Where('doctors.idSchedule', '=', $idSchedule)
                    ->Where('persons.direction', '=', $direction)
                    ->select(
                        'doctors.id as doctor_id',
                        'persons.id as idPerson',
                        'persons.name',
                        'persons.lastName',
                        'persons.birthDate',
                        'persons.direction',
                        'persons.phone',
                        'persons.typeBlood',
                        'specialties.id as idSpecialty',
                        'specialties.specialty',
                        'schedules.id as idSchedule',
                        'schedules.schedule'
                    )
                    ->get();
                return response()->json($doctors);
            } else {
                $doctors = DB::table('doctors')
                    ->join('persons', 'persons.id', '=', 'doctors.idPerson')
                    ->join('specialties', 'specialties.id', '=', 'doctors.idSpecialty')
                    ->join('schedules', 'schedules.id', '=', 'doctors.idSchedule')
                    ->where('doctors.idSpecialty', '=', $idSpecialties)
                    ->where('doctors.idSchedule', '=', $idSchedule)
                    ->where('persons.direction', '=', $direction)
                    ->select(
                        'doctors.id as doctor_id',
                        'persons.id as idPerson',
                        'persons.name',
                        'persons.lastName',
                        'persons.birthDate',
                        'persons.direction',
                        'persons.phone',
                        'persons.typeBlood',
                        'specialties.id as idSpecialty',
                        'specialties.specialty',
                        'schedules.id as idSchedule',
                        'schedules.schedule'
                    )
                    ->get();

                return response()->json($doctors);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

/*     public function cancelarCita($id)
    {
        // Encuentra la cita por su ID
        $cita = AppointmentRequest::find($id);

        if (!$cita) {
            return response()->json(['mensaje' => 'Cita no encontrada'], 404);
        }

        // Aplica la lógica de cancelación
        $cita->state= 0;
        $cita->save();

        return response()->json(['mensaje' => 'Cita cancelada ']);
}
public function aceptarCita($id)
    {
        $cita = AppointmentRequest::find($id);

        if (!$cita) {
            return response()->json(['mensaje' => 'Cita no encontrada'], 404);
        }

        // Aplica la lógica para marcar la cita como aceptada
        $cita->state= 1;
        $cita->save();

        return response()->json(['mensaje' => 'Cita aceptada exitosamente']);
}
public function reprogramarCita(Request $request, $id)
{
    $cita = Schedule::find($id);

    if (!$cita) {
        return response()->json(['mensaje' => 'Cita no encontrada'], 404);
    }

    // Actualiza la fecha y hora de la cita con los nuevos valores
    $cita->current_date= $request->input('nueva_fecha');
    $cita->save();

    return response()->json(['mensaje' => 'Cita reprogramada exitosamente']);
} */
}
