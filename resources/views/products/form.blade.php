<div class="card p-4 shadow-sm">
    <div class="mb-3">
        <label for="name" class="form-label fw-bold">اسم المنتج</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-box"></i></span>
            <input type="text" name="name" id="name" class="form-control"
                   value="{{ old('name', $product->name ?? '') }}" required placeholder="أدخل اسم المنتج">
        </div>
    </div>

    <div class="mb-3">
        <label for="details" class="form-label fw-bold">تفاصيل المنتج</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
            <input type="text" name="details" id="details" class="form-control"
                   value="{{ old('details', $product->details ?? '') }}" required placeholder="أدخل تفاصيل المنتج">
        </div>
    </div>

    <div class="mb-3">
        <label for="supplierID" class="form-label">المورد</label>
        <select name="supplierID" id="supplierID" class="form-control" required>
            <option value="">اختر المورد</option>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ old('supplierID', $product->supplierID ?? '') == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- فئة السيارة --}}
<div class="mb-3">
    <label for="car_category" class="form-label fw-bold">فئة السيارة</label>
    <select name="car_category" id="car_category" class="form-control">
        <option value="">اختر الفئة</option>
        <option value="سيدان" {{ old('car_category', $product->car_category ?? '') == 'سيدان' ? 'selected' : '' }}>سيدان</option>
        <option value="SUV" {{ old('car_category', $product->car_category ?? '') == 'SUV' ? 'selected' : '' }}>SUV</option>
        <option value="هاتشباك" {{ old('car_category', $product->car_category ?? '') == 'هاتشباك' ? 'selected' : '' }}>هاتشباك</option>
        <option value="بيك أب" {{ old('car_category', $product->car_category ?? '') == 'بيك أب' ? 'selected' : '' }}>بيك أب</option>
        <option value="كوبيه" {{ old('car_category', $product->car_category ?? '') == 'كوبيه' ? 'selected' : '' }}>كوبيه</option>
        <option value="فان" {{ old('car_category', $product->car_category ?? '') == 'فان' ? 'selected' : '' }}>فان</option>
        <option value="ميني فان" {{ old('car_category', $product->car_category ?? '') == 'ميني فان' ? 'selected' : '' }}>ميني فان</option>
        <option value="واجون" {{ old('car_category', $product->car_category ?? '') == 'واجون' ? 'selected' : '' }}>واجون</option>
        <option value="رياضية" {{ old('car_category', $product->car_category ?? '') == 'رياضية' ? 'selected' : '' }}>رياضية</option>
        <option value="كروس أوفر" {{ old('car_category', $product->car_category ?? '') == 'كروس أوفر' ? 'selected' : '' }}>كروس أوفر</option>
    </select>
</div>


{{-- الشركة المصنعة للسيارة --}}
<div class="mb-3">
    <label for="car_brand" class="form-label fw-bold">الشركة المصنعة للسيارة</label>
    <select name="car_brand" id="car_brand" class="form-control">
        <option value="">اختر الشركة</option>
        @php
            $carBrands = [
                'Toyota', 'Honda', 'Nissan', 'Mitsubishi', 'Mazda', 'Subaru', 'Suzuki', 'Lexus', 'Acura',
                'Hyundai', 'Kia', 'Genesis',
                'Ford', 'Chevrolet', 'GMC', 'Cadillac', 'Dodge', 'Chrysler', 'Jeep', 'Lincoln', 'Buick',
                'Tesla',
                'Volkswagen', 'Audi', 'BMW', 'Mercedes-Benz', 'Porsche', 'Opel', 'Skoda', 'SEAT', 'Mini',
                'Volvo', 'Saab',
                'Peugeot', 'Renault', 'Citroën', 'Fiat', 'Alfa Romeo', 'Lancia', 'Ferrari', 'Lamborghini', 'Maserati',
                'Jaguar', 'Land Rover', 'Bentley', 'Aston Martin', 'Rolls-Royce', 'McLaren',
                'Chery', 'Geely', 'BYD', 'Great Wall', 'Haval', 'Nio', 'XPeng', 'Hongqi',
                'Isuzu', 'Daewoo', 'Daihatsu', 'Proton', 'Perodua',
                'Tata', 'Mahindra', 'Maruti Suzuki',
            ];
        @endphp

        @foreach($carBrands as $brand)
            <option value="{{ $brand }}" {{ old('car_brand', $product->car_brand ?? '') == $brand ? 'selected' : '' }}>
                {{ $brand }}
            </option>
        @endforeach
    </select>
</div>


    {{-- موديل السيارة --}}
    <div class="mb-3">
        <label for="car_model" class="form-label fw-bold">موديل السيارة</label>
        <input type="text" name="car_model" id="car_model" class="form-control"
               value="{{ old('car_model', $product->car_model ?? '') }}" placeholder="مثال: كامري 2020">
    </div>

    {{-- الشركة المصنعة للمنتج --}}
    <div class="mb-3">
        <label for="product_brand" class="form-label fw-bold">الشركة المصنعة للمنتج</label>
        <input type="text" name="product_brand" id="product_brand" class="form-control"
               value="{{ old('product_brand', $product->product_brand ?? '') }}" placeholder="مثال: Bosch, Denso">
    </div>

    {{-- هل المنتج أصلي؟ --}}
    <div class="mb-3">
        <label for="is_original" class="form-label fw-bold">نوع المنتج</label>
        <select name="is_original" id="is_original" class="form-control">
            <option value="">اختر</option>
            <option value="1" {{ (isset($product) && $product->is_original) ? 'selected' : '' }}>أصلي</option>
            <option value="0" {{ (isset($product) && $product->is_original === 0) ? 'selected' : '' }}>تجاري</option>
        </select>
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> حفظ
        </button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            <i class="fas fa-times"></i> إلغاء
        </a>
    </div>
</div>
