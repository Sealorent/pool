<?php

namespace App\Properties;

class StatusReservation
{
    public static function setStatus($status)
    {
        if ($status == 'pending') {
            return '<span class="badge bg-label-warning">Pending</span>';
        } elseif ($status == 'approved') {
            return  '<span class="badge bg-label-success">Distejui</span>';
        } elseif ($status == 'rejected') {
            return '<span class="badge bg-label-danger">Ditolak</span>';
        } elseif ($status == 'onprocess') {
            return '<span class="badge bg-label-warning">Proses</span>';
        } elseif ($status == 'done') {
            return '<span class="badge bg-label-success">Selesai</span>';
        }
    }

    public static function setStatusVehicle($status)
    {
        if ($status == 'dipakai') {
            return '<span class="badge bg-label-warning">Dipakai</span>';
        } elseif ($status == 'tersedia') {
            return  '<span class="badge bg-label-success">Tersedia</span>';
        } elseif ($status == 'perbaikan') {
            return '<span class="badge bg-label-danger">Perbaikan</span>';
        }
    }
}
