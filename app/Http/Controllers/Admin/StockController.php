<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StockRequests\StoreStockRequest;
use App\Http\Requests\StockRequests\UpdateStockRequest;
use App\Http\Services\FileService;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StockController extends Controller
{
    public function stock()
    {
        $resSearch = request('search') ?? '';
        $stocks = Stock::getIndexStock($resSearch);

        $stocks = $stocks->where('start_date', '<=', now())
            ->where('end_date', '>=', now())->paginate(3)
            ->withQueryString();

        return view('stocks.stock', ['stocks' => $stocks]);
    }

    public function showValidStock(Request $request)
    {
        if ($request->get('stock')) {
            $stocks = Stock::all()->where("end_date", '<=', now());
        } else {
            $stocks = Stock::all()->where("end_date", '>=', now());
        }
        session()->flashInput($request->input());
        return view('stocks.index', compact('stocks'));
    }

    public function showStock(Stock $stock)
    {
        return view('stocks.show-stock', compact('stock'));
    }

    public function index()
    {
        $stocks = Stock::all();
        return view('stocks.index', ['stocks' => $stocks]);
    }

    public function create()
    {
        return view('stocks.create');
    }

    public function store(StoreStockRequest $request)
    {
        $path = FileService::uploadFile($request->file('image'));
        $stock = Stock::getStoreStock($request, $path);

        return redirect()->route('admin.stocks.show', $stock)
            ->with('success', 'Данные успешно сохранены...');
    }

    public function show(Stock $stock)
    {
        return view('stocks.show', compact('stock'));
    }

    public function edit(Stock $stock)
    {
        if (Gate::allows('edit-stock', $stock)) {
            return view('stocks.edit', ['stock' => $stock]);
        }
        return redirect()->route('admin.stocks.show', $stock);
    }

    public function update(UpdateStockRequest $request, Stock $stock)
    {
        $path = FileService::updateFile($request->file('image'), $stock->image);

        $stock->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'image' => $path
        ]);

        return redirect()->route('admin.stocks.show', $stock)
            ->with('success', 'Данные успешно сохранены...');
    }

    public function destroy(Stock $stock)
    {
        if (Gate::allows('delete-stock', $stock)) {
            FileService::deleteFile($stock->image);
            $stock->delete();

            return redirect()->route('admin.stocks.index')
                ->with('success', 'Данные успешно удалены...');
        }
        return redirect()->route('admin.stocks.show', $stock);
    }
}
