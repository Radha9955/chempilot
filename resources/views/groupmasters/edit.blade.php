<h2>{{ isset($group) ? 'Edit Group' : 'Create Group' }}</h2>

<form method="POST" action="{{ isset($group) ? route('groupmasters.update', $group->ID) : route('groupmasters.store') }}">
    @csrf
    @if(isset($group)) @method('PUT') @endif

    <div style="margin-bottom: 10px;">
        <label for="GroupName">Group Name:</label><br>
        <input type="text" id="GroupName" name="GroupName" value="{{ old('GroupName', $group->GroupName ?? '') }}" required>
    </div>

    <div style="margin-bottom: 10px;">
        <label>
            <input type="checkbox" name="IsActive" value="1" {{ old('IsActive', $group->IsActive ?? false) ? 'checked' : '' }}>
            Is Active
        </label>
    </div>

    <div style="margin-bottom: 10px;">
        <label>
            <input type="checkbox" name="IsNBGroup" value="1" {{ old('IsNBGroup', $group->IsNBGroup ?? false) ? 'checked' : '' }}>
            Is NB Group
        </label>
    </div>

    <button type="submit">{{ isset($group) ? 'Update' : 'Save' }}</button>
</form>
