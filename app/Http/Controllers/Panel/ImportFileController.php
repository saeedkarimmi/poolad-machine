<?php

namespace App\Http\Controllers\Panel;

use App\DataTables\ImportFileDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportFile\CreateRequest;
use App\Http\Requests\ImportFile\StoreRequest;
use App\Models\Panel\Bank;
use App\Models\Panel\Currency;
use App\Models\Panel\ImportFile;
use App\Models\Panel\Order;
use App\Repositories\BankRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\ImportFileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportFileController extends Controller
{
    private ImportFileRepository $importFile;
    private CurrencyRepository $currency;
    private BankRepository $bank;

    public function __construct(ImportFile $importFile, Currency $currency, Bank $bank)
    {
        $this->importFile = new ImportFileRepository($importFile);
        $this->currency = new CurrencyRepository($currency);
        $this->bank = new BankRepository($bank);
    }

    public function index(ImportFileDataTable $dataTable)
    {
//        Who Wants To Live Forever
        return $dataTable->render('panel.import-file.index');
    }

    public function create(CreateRequest $request)
    {
        // todo : check
        /** @var Order $order */
        $order = Order::query()->findOrFail($request->get('order_id'));
        $orderDetails  = $order->details()->whereIn('id', $request->get('details'))->get();
        $currencies = $this->currency->all();
        $banks = $this->bank->all();

        return view('panel.import-file.create', compact('order', 'orderDetails', 'currencies', 'banks'));
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
            // todo: check details
            $this->importFile->create($request->only([
                'order_id',
                'file_number',
                'order_registration_code',
                'incoterm',
                'proforma_number',
                'currency_id',
                'bank_id',
                'order_register_completion_date',
                'order_register_issue_date',
                'order_register_validity_date',
                'currency_allocate_application_date',
                'currency_allocate_issue_date',
                'validity_currency_allotment_date',
                'order_details'
            ]));

            DB::commit();
            return returnSuccess(trans('general.message.create.success'), route('panel.import_files.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            return returnError([trans('general.message.internal_server_error')]);
        }
    }

    public function show(ImportFile $importFile)
    {
        return view('panel.import-file.show', compact('importFile'));
    }
}
