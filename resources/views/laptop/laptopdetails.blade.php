<!-- resources/views/laptop/laptopdetails.blade.php -->

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Brand Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($laptops as $laptop)
            <tr>
                <td>{{ $laptop->id }}</td>
                <td>{{ $laptop->brand_name }}</td>
                <td>{{ $laptop->description }}</td>
                <td>{{ $laptop->price }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
