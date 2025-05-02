<div class="mb-3">
    <label class="form-label">اسم المورد</label>
    <input type="text" name="SupplierName" class="form-control @error('SupplierName') is-invalid @enderror"
           value="{{ old('SupplierName', $supplier->SupplierName ?? '') }}">
    @error('SupplierName')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">الشخص المسؤول</label>
    <input type="text" name="ContactPerson" class="form-control @error('ContactPerson') is-invalid @enderror"
           value="{{ old('ContactPerson', $supplier->ContactPerson ?? '') }}">
    @error('ContactPerson')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">رقم الهاتف</label>
    <input type="text" name="PhoneNumber" class="form-control @error('PhoneNumber') is-invalid @enderror"
           value="{{ old('PhoneNumber', $supplier->PhoneNumber ?? '') }}">
    @error('PhoneNumber')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>العنوان</label>
    <input type="text" name="Address" class="form-control" value="{{ old('Address', $supplier->Address ?? '') }}">
</div>

<div class="form-group">
    <label>المدينة</label>
    <input type="text" name="City" class="form-control" value="{{ old('City', $supplier->City ?? '') }}">
</div>

<div class="form-group">
    <label>الدولة</label>
    <input type="text" name="Country" class="form-control" value="{{ old('Country', $supplier->Country ?? '') }}">
</div>


<div class="mb-3">
    <label class="form-label">البريد الإلكتروني</label>
    <input type="email" name="Email" class="form-control @error('Email') is-invalid @enderror"
           value="{{ old('Email', $supplier->Email ?? '') }}">
    @error('Email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">الموقع الإلكتروني</label>
    <input type="text" name="CompanyWebsite" class="form-control @error('CompanyWebsite') is-invalid @enderror"
           value="{{ old('CompanyWebsite', $supplier->CompanyWebsite ?? '') }}">
    @error('CompanyWebsite')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
