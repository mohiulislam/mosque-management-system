<div>
    <h2>{{ $mosque->name }}</h2>
    <p><strong>Address:</strong> {{ $mosque->address }}</p>
    <p><strong>Contact Number:</strong> {{ $mosque->contact_number }}</p>
    <p><strong>Capacity:</strong> {{ $mosque->capacity }}</p>
    <p><strong>Description:</strong> {{ $mosque->description }}</p>
    @if ($mosque->image)
        <p><strong>Image:</strong></p>
        <img src="{{ asset('storage/images/' . $mosque->image) }}" alt="{{ $mosque->name }}" width="200">
    @endif
</div>
