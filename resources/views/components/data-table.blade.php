@props(['headers' => []])

<div class="w-full overflow-hidden rounded-lg border border-border">
    <div class="overflow-x-auto">
        <table class="w-full text-sm divide-y divide-border">
            <thead>
                <tr class="bg-muted/50">
                    @foreach($headers as $header)
                        <th class="px-6 py-3 text-left text-xs font-medium text-muted-foreground uppercase tracking-wider">
                            {{ $header }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="bg-card divide-y divide-border">
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div> 