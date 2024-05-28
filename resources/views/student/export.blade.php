<table>
    <thead>
        <tr>
            <th>DNI</th>
            <th>Apellido</th>
            <th>Nombre</th>
            <th>Asistencias</th>
            <th>Condición</th>
            <tH>Año</th>
        </tr>
    </thead>
    <tbody>
        @foreach($studentsData as $student)
            <tr>
                <td>{{ $student['alumn_DNI'] }}</td>
                <td>{{ $student['apellido'] }}</td>
                <td>{{ $student['nombre'] }}</td>
                <td>{{ $student['assistsCount'] }}</td>
                <td>{{ $student['condition'] }}</td>
                <td>{{ $student['año'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>