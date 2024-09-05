<div class="container">
    <div class="compare-table table-responsive">
        <table class="table mb-0">

            <thead>
                <tr class="text-center">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Room Reserved</th>
                    <th>From</th>
                    <th>To</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservations as $reservation)
                    <tr class="text-center">
                        <td class="first-column">{{ $reservation->first_name }} {{ $reservation->last_name }}</td>
                        <td class="prod-1">{{ $reservation->email }}</td>
                        <td>{{ $reservation->room->name }}</td>
                        <td class="prod-2">{{ \Carbon\Carbon::parse($reservation->from)->format('F j, Y') }}</td>
                        <td class="prod-2">{{ \Carbon\Carbon::parse($reservation->to)->format('F j, Y') }}</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">No upcoming reservations</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
