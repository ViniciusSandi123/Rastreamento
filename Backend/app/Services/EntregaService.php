<?php

    namespace App\Services;

    use App\Models\Entrega;

    class EntregaService
    {

        public function buscarPorCpf(string $cpf)
        {
            return Entrega::with([
                'transportadora',
                'remetente',
                'destinatario',
                'rastreamentos' => fn ($q) => $q->orderBy('data', 'asc')
            ])
            ->whereHas('destinatario', fn ($query) => $query->where('cpf', $cpf))
            ->get();
        }

        public function buscarPorId(string $id): ?Entrega
        {
            return Entrega::with([
                'transportadora',
                'remetente',
                'destinatario',
                'rastreamentos' => fn ($q) => $q->orderBy('data', 'asc')
            ])->find($id);
        }
    }
?>