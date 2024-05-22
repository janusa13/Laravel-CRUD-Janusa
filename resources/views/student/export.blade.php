<table>
    <thead>
        <tr>
            <th>DNI</th>
            <th>Apellido</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach($student as $student)
            <tr>
                <td>{{ $student->alumn_DNI }}</td>
                <td>{{ $student->apellido }}</td>
                <td>{{ $student->nombre }}</td>
            </tr>
        @endforeach
    </tbody>
</table>