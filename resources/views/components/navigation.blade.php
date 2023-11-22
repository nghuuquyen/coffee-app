<div class="bg-surface sticky top-0 mt-[-10px]" id="app_navigation">
    <div class="max-w-screen-lg m-auto" x-data="{
        activeIndex: 0,
        navigationHeight: document.querySelector('#app_navigation').getBoundingClientRect().height + 10
    }">
        <ul class="flex flex-row w-full items-center justify-center">
            @foreach ($categories as $category)
                <li class="px-6 py-3 cursor-pointer" x-transition
                    @click="
                        activeIndex = {{ $loop->index }};

                        window.scroll({
                            top: document.querySelector('#category_{{ $category['id'] }}').getBoundingClientRect().top - navigationHeight,
                            behavior: 'smooth'
                        });
                    "
                    @scroll.window="
                        if (document.querySelector('#category_{{ $category['id'] }}').getBoundingClientRect().top - navigationHeight <= 0) {
                            activeIndex = {{ $loop->index }}
                        }
                    "
                    :class="{ 'border-primary-500 border-b-2 text-primary-500': activeIndex === {{ $loop->index }} }">
                    <a class="font-normal text-base text-on-surface-600 hover:text-on-primary-600">
                        {{ $category['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>