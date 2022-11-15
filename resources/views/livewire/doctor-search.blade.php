<div>
    <div class="row">
        <div class="col-2 ml-5">
            <input type="text" wire:model="search" class="form-control me-5 border border-dark w-50"
                placeholder="Search doctors..."><br><br>
        </div>
        <div class="col-2">
            {{-- <label>Sections</label> --}}
            <select wire:model="selectFilter" class="custom-select rounded border border-dark w-75">
                <!--placeholder-->
                <option value="" selected>
                    ...
                </option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}"> {{ $section->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <ul>
        @foreach ($doctors as $doctor)
            <!-- Row -->
            <div class="row row-sm">
                <div class="col-xl-9 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <h2 class="tx-dark text-lg-right">السيرة الذاتية</h2>
                        </div>
                        <br><br>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-8">
                                    <div class="text-lg-right">
                                        <h4>{{ $doctor->sections->name }}</h4>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="text-lg-right">
                                        <h4>: التخصص العام</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-8">
                                    <div class="text-lg-right">
                                        <h4>{{ $doctor->specialization }}</h4>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="text-lg-right">
                                        <h4>: التخصص الدقيق</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-8">
                                    <div class="text-lg-right">
                                        <h4>{{ $doctor->qualification }}</h4>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="text-lg-right">
                                        <h4>: المؤهلات العلمية</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-8">
                                    <div class="text-lg-right">
                                        <h4>{{ $doctor->cases }}</h4>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="text-lg-right">
                                        <h4>: الحالات التي يراها</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <h2 class="text-lg-center">د. {{ $doctor->doctor_name }}</h2>
                        </div>
                        <div class="card-body text-center item-user">
                            {{-- <h5 class="text-danger"> {{ $doctor->code }} </h5> --}}
                            <div class="profile-pic">
                                <div class="profile-pic-img">
                                    <span class="bg-success dots" data-toggle="tooltip" data-placement="top"
                                        title="online"></span>
                                    @if ($doctor->gender == 'ذكر')
                                        <img src="{{ URL::asset('assets/img/users/doctor-avatar-male.png') }}"
                                            class="rounded-circle" alt="user">
                                    @elseif ($doctor->gender == 'انثى')
                                        <img src="{{ URL::asset('assets/img/users/doctor-avatar-female.png') }}"
                                            class="rounded-circle" alt="user">
                                    @endif
                                </div>
                                <div class="text-black">
                                    {{-- <h5 class="mt-3 mb-0 font-weight-semibold">د. {{ $doctor->doctor_name }}</h5> --}}
                                    <h4>{{ $doctor->nationalities->name }}</h4>
                                    <h4>التخصص |
                                        {{ $doctor->sections->name }}
                                    </h4>
                                    <h5 class="text-danger">الأعمار |
                                        {{ $doctor->ages }} <br>
                                        {{ $doctor->except }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Row -->
        @endforeach
    </ul>

</div>
