<?php

namespace App\Http\Controllers\Panel;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Models\Panel\Currency;
use App\Models\Panel\MachineModel;
use App\Models\Panel\Order;
use App\Models\Panel\PaymentMethod;
use App\Models\Panel\Seller;
use App\Models\Panel\Spiral;
use App\Models\Panel\SystemControl;
use App\Repositories\CurrencyRepository;
use App\Repositories\MachineModelRepository;
use App\Repositories\OrderRepository;
use App\Repositories\SellerRepository;
use App\Repositories\SpiralRepository;
use App\Repositories\SystemControlRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected OrderRepository $order;
    protected SellerRepository $seller;
    protected MachineModelRepository $machineModel;
    protected SpiralRepository $spiral;
    protected CurrencyRepository $currency;
    protected SystemControlRepository $systemControls;

    public function __construct(Order $order, Seller $seller, MachineModel $machineModel, Spiral $spiral, SystemControl $systemControls, Currency $currency)
    {
        $this->order = new OrderRepository($order);
        $this->seller = new SellerRepository($seller);
        $this->machineModel = new MachineModelRepository($machineModel);
        $this->spiral = new SpiralRepository($spiral);
        $this->systemControls = new SystemControlRepository($systemControls);
        $this->currency = new CurrencyRepository($currency);
    }

    /**
     * Display a listing of the resource.
     *
     * @param OrderDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('panel.order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $sellers = $this->seller->all();
        $spirals = $this->spiral->all();
        $systemControls = $this->systemControls->all();
        $machineModels = $this->machineModel->all();
        $currencies = $this->currency->all();
        $paymentMethods = PaymentMethod::all();

        return view('panel.order.create', compact('sellers', 'paymentMethods', 'machineModels', 'spirals', 'systemControls', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return array
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->order->create($request->only(['order_name', 'sum','seller_id', 'currency_id','payment_method_id','registered_at','description','machine_models']));

            DB::commit();
            return returnSuccess(trans('general.message.create.success'), route('panel.orders.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }

    public function show(Order $order)
    {
        return view('panel.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Order $order)
    {
        return view('panel.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Order $order
     * @return array
     */
    public function update(UpdateRequest $request, Order $order)
    {
        DB::beginTransaction();
        try {
//            $this->order->update($request->only(['permissions']), $order);

            DB::commit();
            return returnSuccess(trans('general.message.update.success'), route('panel.orders.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }
}
