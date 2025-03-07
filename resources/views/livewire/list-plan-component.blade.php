<div class="mt-5">
    @if ($plans->isEmpty())
        <p class="text-center text-muted">Belum ada agenda silakan tambahkan terlebih dahulu</p>
    @else
        @foreach ($plans as $plan)
            <div class="my-2">
                <p class="mb-0">Tag: {{ $plan->tag->name }}</p>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span
                                    class="badge
                                @if ($plan->priority == 'high') bg-danger-subtle border border-danger-subtle text-danger-emphasis
                                @elseif ($plan->priority == 'medium') bg-warning-subtle border border-warning-subtle text-warning-emphasis
                                @else bg-primary-subtle border border-primary-subtle text-primary-emphasis @endif
                                ">
                                    @if ($plan->priority == 'high')
                                        High
                                    @elseif ($plan->priority == 'medium')
                                        Medium
                                    @else
                                        Low
                                    @endif
                                </span>
                            </div>
                            <div class="d-flex gap-1">
                                <button type="button" class="btn btn-sm"
                                    wire:click='set("selectedPlanId", {{ $plan->id }})'>
                                    {{-- Gear Icon --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
                                        <path
                                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
                                    </svg>
                                </button>
                                <button type="button" class="btn btn-sm" wire:click='deletePlan({{ $plan->id }})'
                                    wire:confirm="Are you sure you want to delete this plan?">
                                    {{-- Trash Icon --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="mt-3">
                            @if ($selectedPlanId === $plan->id)
                                <form wire:submit='updatePlan({{ $plan->id }})'>
                                    <input type="text" class="form-control pl-0 @error('task') is-invalid @enderror"
                                        id="validationServer05" aria-describedby="validationServer05Feedback" required
                                        value="{{ $plan->task }}" wire:keydown.enter="search($event.target.value)">
                                    <div id="validationServer05Feedback" class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </form>
                            @else
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckCheckedDisabled" {{ $selectedPlanId !== null ? 'disabled' : '' }}>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        {{ $plan->task }}
                                    </label>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

</div>
