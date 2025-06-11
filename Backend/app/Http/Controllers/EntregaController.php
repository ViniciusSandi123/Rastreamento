<?php

    namespace App\Http\Controllers;

    use App\Services\EntregaService;
    use Illuminate\Http\Request;
    use Illuminate\Routing\Controller;

    class EntregaController extends Controller
    {
        protected EntregaService $service;
    
        public function __construct(EntregaService $service)
        {
            $this->service = $service;
        }
    
        public function buscarPorCpf(Request $request)
        {
            $cpf = $request->query('cpf');
    
            if (!$cpf) {
                return response()->json(['erro' => 'CPF não informado'], 400);
            }
    
            $entregas = $this->service->buscarPorCpf($cpf);
    
            if ($entregas->isEmpty()) {
                return response()->json(['mensagem' => 'Nenhuma entrega encontrada para este CPF'], 404);
            }
    
            return response()->json($entregas);
        }
    
        public function detalharEntrega(string $id)
        {
            $entrega = $this->service->buscarPorId($id);
    
            if (!$entrega) {
                return response()->json(['mensagem' => 'Entrega não encontrada'], 404);
            }
    
            return response()->json($entrega);
        }
    }    
?>