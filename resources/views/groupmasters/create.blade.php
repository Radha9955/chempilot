<h2>Add New Group</h2>

<form action="{{ route('groupmasters.store') }}" method="POST">
    @csrf
    <label for="GroupName">Group Name:</label>
    <input type="text" name="GroupName" id="GroupName" required>
    <button type="submit">Save</button>
</form>

<a href="{{ route('groupmasters.index') }}">Back to List</a>
