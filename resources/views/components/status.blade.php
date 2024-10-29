@switch($status->value)
    @case('open')
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3 uppercase">
            <span class="flex w-2.5 h-2.5 bg-blue-600 rounded-full me-1.5 flex-shrink-0"></span>
            open
        </span>
    @break

    @case('in_progress')
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3 uppercase">
            <span class="flex w-2.5 h-2.5 bg-yellow-300 rounded-full me-1.5 flex-shrink-0"></span>
            in progress
        </span>
    @break

    @case('resolved')
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3 uppercase">
            <span class="flex w-2.5 h-2.5 bg-green-500 rounded-full me-1.5 flex-shrink-0"></span>
            resolved
        </span>
    @break

    @case('closed')
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3 uppercase">
            <span class="flex w-2.5 h-2.5 bg-gray-900 rounded-full me-1.5 flex-shrink-0"></span>
            closed
        </span>
    @break

    @default
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3 uppercase">
            <span class="flex w-2.5 h-2.5 bg-blue-600 rounded-full me-1.5 flex-shrink-0"></span>
            open
        </span>
@endswitch
