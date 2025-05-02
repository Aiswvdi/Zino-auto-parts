@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة أمر صرف جديد</h2>

    <form action="{{ route('stock_issue_orders.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>رقم أمر الصرف:</label>
            <input type="text" name="issue_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label>تاريخ الصرف:</label>
            <input type="date" name="issue_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label>تم الصرف بواسطة:</label>
            <input type="text" name="issued_by" class="form-control">
        </div>

        <div class="form-group">
            <label>الموافقة من:</label>
            <input type="text" name="approved_by" class="form-control">
        </div>

        <div class="form-group">
            <label>ملاحظات:</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <hr>
        <h4>تفاصيل القطع</h4>

        <div id="items">
            <div class="item border p-3 mb-2">
                <div class="form-group">
                    <label>رقم القطعة:</label>
                    <input type="text" name="items[0][part_number]" class="form-control">
                </div>
                <div class="form-group">
                    <label>رقم العمود:</label>
                    <input type="text" name="items[0][column_number]" class="form-control">
                </div>
                <div class="form-group">
                    <label>رقم الرف:</label>
                    <input type="text" name="items[0][shelf_number]" class="form-control">
                </div>
                <div class="form-group">
                    <label>نوع القطعة:</label>
                    <input type="text" name="items[0][part_type]" class="form-control">
                </div>
                <div class="form-group">
                    <label>فئة القطعة:</label>
                    <input type="text" name="items[0][part_category]" class="form-control">
                </div>
                <div class="form-group">
                    <label>الكمية المصروفة:</label>
                    <input type="number" name="items[0][issued_quantity]" class="form-control" min="1">
                </div>
            </div>
        </div>

        <button type="button" id="addItem" class="btn btn-secondary mb-3">إضافة قطعة أخرى</button>

        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
</div>

<script>
    let index = 1;
    document.getElementById('addItem').addEventListener('click', function () {
        const container = document.createElement('div');
        container.classList.add('item', 'border', 'p-3', 'mb-2');
        container.innerHTML = `
            <div class="form-group">
                <label>رقم القطعة:</label>
                <input type="text" name="items[${index}][part_number]" class="form-control">
            </div>
            <div class="form-group">
                <label>رقم العمود:</label>
                <input type="text" name="items[${index}][column_number]" class="form-control">
            </div>
            <div class="form-group">
                <label>رقم الرف:</label>
                <input type="text" name="items[${index}][shelf_number]" class="form-control">
            </div>
            <div class="form-group">
                <label>نوع القطعة:</label>
                <input type="text" name="items[${index}][part_type]" class="form-control">
            </div>
            <div class="form-group">
                <label>فئة القطعة:</label>
                <input type="text" name="items[${index}][part_category]" class="form-control">
            </div>
            <div class="form-group">
                <label>الكمية المصروفة:</label>
                <input type="number" name="items[${index}][issued_quantity]" class="form-control" min="1">
            </div>
        `;
        document.getElementById('items').appendChild(container);
        index++;
    });
</script>
@endsection
