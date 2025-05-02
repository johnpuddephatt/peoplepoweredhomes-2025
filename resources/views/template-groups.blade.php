{{--
  Template Name: Groups Template
--}}
@extends('layouts.app')

@section('content')
  <div id="map" class="mx-auto mt-8 aspect-video max-w-6xl rounded-2xl bg-gray/30"></div>
  <script>
    function initMap() {
      window.dispatchEvent(new Event('map-loaded'));
    }
  </script>
  <script data-cookieconsent="ignore" loading="async" async="" defer=""
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC79w3vlb0BHortUdnEqeoD-3fLPz0QU-I&amp;callback=initMap">
  </script>

  <div @keyup.escape="selected = null"
    x-effect="selected == null ? document.documentElement.classList.remove('overflow-hidden') : document.documentElement.classList.add('overflow-hidden');    
    var scrollmem = document.documentElement.scrollTop;
    history.pushState(null,null,window.location.hash = selected ? '#' + selected : '');
    document.documentElement.scrollTop = scrollmem;"
    x-data="{
        stageFilter: null,
        locationFilter: null,
        selected: null,
        selectedGroup: function() {
            return this.groups.find((group) => group.post_name == this.selected);
        },
        selectPin: function(id) {
            this.selected = id;
    
            if (this.markers) {
                this.markers.forEach((m) => {
                    m.setIcon(this.smallIcon);
                });
                if (id) {
                    this.markers.find((marker) => marker.title == id).setIcon(this.bigIcon);
                };
            };
        },
        map: null,
        groups: {{ json_encode($groups) }},
        filteredGroups: function() {
            return this.groups.filter((group) => {
                if (this.stageFilter && group.stage != this.stageFilter) { return false; }
                if (this.locationFilter && group.area != this.locationFilter) { return false; }
                return true;
            });
        },
        setupMap() {
            this.map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: { lat: 53.8008, lng: -1.5491 }
            });
    
            this.smallIcon = {
                path: 'M-1.547 12l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM0 0q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z',
                fillColor: 'black',
                fillOpacity: 1,
                strokeWeight: 0,
                scale: 2,
                anchor: new google.maps.Point(0, 20)
            };
            this.bigIcon = {
                path: 'M-1.547 12l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM0 0q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z',
                fillColor: '#64e2d8',
                fillOpacity: 1,
                strokeWeight: 0,
                scale: 3,
                anchor: new google.maps.Point(0, 20)
            };
        },
        plotMarkers() {
            let markers = [];
            this.groups.forEach((group) => {
    
                if (isNaN(group.location.lat)) { return; }
                markers.push(new window.google.maps.Marker({
                    position: { lat: group.location.lat, lng: group.location.lng },
                    title: group.post_name,
                    map: this.map,
                    icon: this.smallIcon,
                }));
            });
            this.markers = markers;
    
            this.markers.forEach((marker) => {
                google.maps.event.addListener(marker, 'click', () => {
    
                    this.selectPin(marker.title);
                });
            });
        },
        smallIcon: null,
        bigIcon: null
    }" x-init="if ('google' in window) {
        setupMap();
        plotMarkers();
    
    };
    if (window.location.hash) {
        console.log('selecting...', window.location.hash.substring(1));
        selectPin(window.location.hash.substring(1));
    }" @map-loaded.window="setupMap(); plotMarkers()"
    class="my-8 flex flex-col gap-4">

    <h1 class="!mb-0 text-center text-4xl font-bold">{!! $title !!}</h1>
    <div class="mx-auto flex w-full max-w-6xl items-center justify-end gap-2 py-6">Filter:
      <div class="select">
        <select @change="locationFilter = $event.target.value; console.log($event.target.value)">
          <option value="">All locations</option>

          @foreach ($locations as $location)
            <option value="{{ $location->name }}">{{ $location->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="select">
        <select @change="stageFilter = $event.target.value; console.log($event.target.value)">
          <option value="">All stages</option>
          @foreach ($stages as $stage)
            <option value="{{ $stage->name }}">{{ $stage->name }}</option>
          @endforeach
        </select>
      </div>

    </div>

    {{-- @foreach ($groups as $group)
      <button @click="selectPin('{{ $group->post_name }}')" type="button"
        x-show="!locationFilter || locationFilter == '{{ $group->area }}'"
        class="mx-auto w-full max-w-6xl rounded-2xl border-2 p-8 text-left">
        <h3 class="text-xl font-bold">{{ $group->post_title }}</h3>
        <p>{{ $group->group_status }}</p>
        <p>Location: {{ $group->area }}</p>
      </button>
    @endforeach --}}

    <template x-for="group in filteredGroups()" :key="group.post_name">
      <button @click="selectPin(group.post_name)" type="button"
        class="group mx-auto flex w-full max-w-6xl items-center gap-4 rounded-2xl border-2 p-8 text-left">
        <div x-html="group.thumb ?? null " class="not-prose h-32 w-32 overflow-hidden rounded-full bg-primary/20">
          empty?
        </div>
        <div>
          <h3 class="text-xl font-bold" x-text="group.post_title"></h3>

          <div class="flex items-center gap-4">
            <p class="flex items-center gap-1">
              <x-icons.marker class="inline-block h-4 w-4 fill-black" />
              <span x-text="group.area"></span>
            </p>

            <p class="rounded px-4 py-1"
              :class="{
                  'bg-[lightblue]': group.stage == 'Forming',
                  'bg-[lightyellow]': group.stage ==
                      'Developing',
                  'bg-[lightgreen]': group.stage == 'Established'
              }"
              x-text="group.stage"></p>
          </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5"
          class="ml-auto size-12 opacity-50 group-hover:opacity-100" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>

      </button>
    </template>

    <div x-show="filteredGroups().length == 0" class="mx-auto w-full max-w-6xl rounded-2xl border-2 p-8 text-center">
      <h3 class="text-xl font-bold">No groups found</h3>
      <p>Try changing the filters above.</p>
    </div>

    <template x-if="selected">
      <div>

        <div x-init="setTimeout(() => $el.classList.remove('opacity-0'), 100)" @click="selectPin(null)"
          class="fixed inset-0 z-40 overscroll-contain bg-black/70 opacity-0 filter transition duration-500"></div>
        <dialog open x-init="setTimeout(() => $el.classList.remove('opacity-0', 'translate-y-12'), 100)"
          class="bg-transparent fixed bottom-0 z-50 w-full max-w-4xl translate-y-12 rounded-t-xl opacity-0 transition duration-500">
          <button @click="selectPin(null)" x-init="setTimeout(() => $el.classList.remove('opacity-0'), 800)"
            class="absolute bottom-full left-1/2 z-50 mb-2 flex -translate-x-1/2 items-center gap-1 rounded border-2 border-black bg-white px-6 py-2 opacity-0 transition"
            type="button">

            Close
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg></button>
          <div class="h-[90vh] overflow-auto rounded-t-xl border-2 border-black">
            <div x-show="selectedGroup().image" x-html="selectedGroup().image"
              class="overflow-hidden rounded-lg px-6 pt-6">
            </div>

            <div class="sticky top-0 bg-white px-6 pt-6">
              <h2 class="mb-2 text-4xl font-bold" x-text="selectedGroup().post_title"></h2>
              <div class="flex items-center gap-4">
                <p class="flex items-center gap-1">
                  <x-icons.marker class="inline-block h-4 w-4 fill-black" />
                  <span x-text="selectedGroup().area"></span>
                </p>

                <p class="rounded px-4 py-1"
                  :class="{
                      'bg-[lightblue]': selectedGroup().stage == 'Forming',
                      'bg-[lightyellow]': selectedGroup().stage ==
                          'Developing',
                      'bg-[lightgreen]': selectedGroup().stage == 'Established'
                  }"
                  x-text="selectedGroup().stage"></p>
              </div>
              <hr x-show="selectedGroup().post_content" class="my-6 !h-0.5 rounded-2xl bg-primary" />
            </div>
            <div class="prose max-w-2xl px-6 pb-8" x-html="selectedGroup().post_content"></div>
          </div>
        </dialog>
      </div>
  </div>
  </template>
  </div>
@endsection
