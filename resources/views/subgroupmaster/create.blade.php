<form action="{{ route('subgroupmaster.store') }}" method="POST">
    @csrf

    <label>SubGroup Name</label>
    <input type="text" name="SubGroupName" required>

    <label>Group ID</label>
    <input type="number" name="GroupID">

    <label>Discount (%)</label>
    <input type="number" step="0.01" name="DiscountPct">

    <label>Tax (%)</label>
    <input type="number" step="0.01" name="TaxPct">

    <label>Is Active</label>
    <input type="checkbox" name="IsActive" value="1">

    <button type="submit">Create</button>
</form>
