@extends('base')

@section('title', 'Zoznam automobilov')
@section('description', 'Výpis všech automobilu v administraci.')

@section('data')
    <div class="row m-0 justify-content-between">
        <h2 class="mt-2">Zoznam automobilov</h2>

        <form method="get" class="form-inline pt-2 pb-2">
            <label class="mr-2" for="producer">Výrobca</label>
            <select class="form-control mr-4" name="producer" id="producer" onchange="this.form.submit()">
                <option></option>
                @foreach($producers as $producer)
                    <option value="{{$producer->id}}"
                            @if(Request::get("producer") == $producer->id) selected @endif>{{$producer->name}}</option>
                @endforeach
            </select>

            <label class="mr-2" for="sort">Zoradenie</label>
            <select class="form-control" name="sort" id="sort" onchange="this.form.submit()">
                <option value="producer_id">Výrobca</option>
                <option value="engine">Motor</option>
            </select>
            <script type="text/javascript">
                document.getElementById('sort').value = "{{Request::get("sort")}}";
            </script>
        </form>
    </div>

    <div class="row m-0 border-top border-primary">
        <table class="table table-striped table-bordered table-responsive-md">
            <thead>
                <tr>
                    <th>Výrobca</th>
                    <th>Model</th>
                    <th>Motor</th>
                    <th>Datum vytvorenia</th>
                    <th>Datum poslednej zmeny</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @forelse ($cars as $car)
                <tr>
                    <td>{{ $car->producer->name }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->engine }}</td>
                    <td>{{ $car->created_at }}</td>
                    <td>{{ $car->updated_at }}</td>
                    <td>
                        <a href="{{ route('car.edit', ['car' => $car]) }}" class="mr-1" title="Editovať"><i class="fas fa-edit"></i></a>
                        <a href="#" onclick="event.preventDefault(); $('#car-delete-{{ $car->id }}').submit();" class="ml-1 mr-1" title="Vymazať"><i class="fas fa-trash-alt"></i></a>
                        <form action="{{ route('car.destroy', ['car' => $car]) }}" method="POST"
                              id="car-delete-{{ $car->id }}" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="{{ route("car.show", ["car" => $car]) }}" class="ml-1" title="Náhľad"><i class="fas fa-arrow-right"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        Nikto zatiaľ nepridal žiadny automobil.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="row m-0 justify-content-between">
        <span>
            <a href="{{ route('car.create') }}" class="btn btn-dark" id="addCarBtn">
            Pridať nový automobil</a>
        </span>

        <span id="links">
            {{ $cars->withQueryString()->links() }}
        </span>
    </div>
@endsection
