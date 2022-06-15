<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequests\StoreOrderRequest;
use App\Models\Category;
use App\Models\Mark;
use App\Models\Order;
use App\Models\Status;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{

    public function index()
    {
        $marks = Mark::all();
        return view('orders.index', compact('marks'));
    }

    public function indexAdmin()
    {
        $orders = Order::all()->sortByDesc('created_at');
        $statuses = Status::all();

        return view('orders.index-admin', compact('statuses', 'orders'));
    }

    public function indexSort(Request $request)
    {
        $statuses = Status::all();
        if ($request->orderDate) {
            if ($request->typeSort == 'ASC') {
                $typeSort = 'DESC';
                $orderDate = "Sort ↓";
                $orders = Order::all()->sortBy('created_at');
            } elseif ($request->typeSort == 'DESC') {
                $typeSort = 'ASC';
                $orderDate = "Sort ↑";
                $orders = Order::all()->sortByDesc('created_at');
            }
        }

        return view('orders.index-admin', compact('statuses', 'orders', 'typeSort', 'orderDate'));
    }

    public function indexAdminSelect(Request $request)
    {
        $statuses = Status::all();
        $orders = Order::all()->where('status_id', $request->get('status'));

        return view('orders.index-admin', compact('statuses', 'orders'));
    }

    public function history(Order $order)
    {
        $orders = Order::with('user')
            ->latest()
            ->paginate(1);
        return view('orders.order-history', compact('order', 'orders'));
    }

    public function store(StoreOrderRequest $request)
    {
        Auth::user()->orders()->create([
            'numberOfPhone' => $request->get('numberOfPhone'),
            'content' => $request->get('content'),
            'type_id' => $request->get('type'),
        ]);

        return redirect()->route('profile')
            ->with('success', 'Ваша заявка успешно оформлена, скоро с вами свяжутся наши специалисты.
            Статус вашей заявки можно посмотреть в личном кабинете.');
    }

    public function show(Order $order)
    {
        $statuses = Status::all();
        $categories = Category::all();
        return view('orders.show', compact('order', 'statuses', 'categories'));
    }

    public function update(Request $request, Order $order)
    {

        $order->update([
            'status_id' => $request->get('status'),
            'reason' => $request->get('reason'),
        ]);

        $uniqueWorks = $order->works->pluck('id')->merge($request->works)->unique();

        $order->works()->sync($uniqueWorks);

        return to_route('admin.order-edit', $order)
            ->with('success', 'Состояние заявки изменено...');
    }

    public function edit(Order $order)
    {
        $statuses = Status::all();
        $categories = Category::all();

        return view('orders.edit', ['order' => $order, 'statuses' => $statuses, 'categories' => $categories]);
    }

    public function detachWorkInOrder(Order $order, Work $work)
    {
        $order->works()->detach($work);
        return to_route('admin.order-edit', $order);
    }

    public function destroyProfile(Order $order)
    {
        $order->delete();
        return redirect()->route('profile')->with('success', 'Ваша заявка успешно отменена..');
    }

    public function getWorks(Category $category)
    {
        echo json_encode($category->works);
    }


    public function endOrder(Order $order)
    {
        $order->update([
            'status_id' => 4,
            'dateEnd' => now(),
        ]);

        return redirect()->route('admin.order-edit', $order)
            ->with('success', 'Заявка завершена...');
    }

}
