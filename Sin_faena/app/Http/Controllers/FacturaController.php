<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFacturaRequest;
use App\Http\Requests\UpdateFacturaRequest;
use App\Http\Requests\StoreDetalleFacturaRequest;
use App\Http\Requests\UpdateDetalleFacturaRequest;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Detalle_factura;
use App\Models\Pedido;
use App\Models\Servicio;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as facadePdf;
use Illuminate\Support\Facades\Auth;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::all();
        $detalles = Detalle_factura::all();
        $pedidos = Pedido::with(['user'])->get();
        $users = User::all();
        $clientes = Cliente::all();

        $user = Auth::user();
        $layout = 'layouts.app';

        if ($user->hasRole('admin')) {
            $layout = 'layouts.admin';
        } elseif ($user->hasRole('empleado')) {
            $layout = 'layouts.empleado';
        } elseif ($user->hasRole('supervisor')) {
            $layout = 'layouts.supervisor';
        }

        return view('admin.facturas.index', compact('facturas', 'detalles', 'pedidos', 'users', 'clientes', 'layout'));
    }

    public function reporte()
    {
        $facturas = Factura::with(['pedido'])->get();
        $detalles = Detalle_factura::all();
        $pedidos = Pedido::with(['user'])->get();
        $users = User::all();
        $clientes = Cliente::all();

        $pdf = facadePdf::loadView('admin.facturas.reporte', compact('facturas', 'detalles', 'pedidos', 'users', 'clientes'));

        return $pdf->stream('reporte_facturas.pdf');
    }

    public function create()
{
    $facturas = Factura::with(['pedido'])->get();
    $detalles = Detalle_factura::all();
    $pedidos = Pedido::with(['servicios', 'user', 'cliente'])->get(); // Asegúrate de cargar los servicios y el cliente con los pedidos
    $users = User::all();
    $clientes = Cliente::all();
    $servicios = Servicio::all();

    return view('admin.facturas.create', compact('facturas', 'detalles', 'pedidos', 'users', 'clientes', 'servicios'));
}



    public function store(StoreFacturaRequest $request)
    {
        Factura::create($request->validated());
        return redirect()->route('admin.facturas.index')->with('success', 'Factura procesada exitosamente');
    }

    public function show(Factura $factura)
    {
        //
    }

    public function edit(Factura $factura)
    {
        //
    }

    public function update(UpdateFacturaRequest $request, Factura $factura)
    {
        //
    }

    public function destroy(Factura $factura)
    {
        $factura->delete();
        return back();
    }
}
