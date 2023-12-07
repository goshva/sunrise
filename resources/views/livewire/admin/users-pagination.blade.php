<div>
    <div class="admin_dashboard_users_section">
        <div class="admin_dashboard_users_section_content">
            <div class="admin_dashboard_users_section_content_filter">
                <div class="menuTitle">
                    <h1>Сотрудники</h1>
                    <div  id="usersFilter" class="user-btns_flex">
                       
                        <input  onclick="filterUsers(this)"  type="submit" class="user-btns_flex-btn @if ($this->filterByAll) user-btns_flex-btn_active @endif  @if ( !$this->filterByEnded && !$this->filterByProgress && !$this->filterByDidntStart) user-btns_flex-btn_active @endif  " value="все сотрудники"  name="all">
                        <input onclick="filterUsers(this)"    type="submit" class="user-btns_flex-btn @if ($this->filterByEnded) user-btns_flex-btn_active @endif " value="завершили" name="ended" >
                        <input onclick="filterUsers(this)" type="submit" class="user-btns_flex-btn @if ($this->filterByProgress) user-btns_flex-btn_active @endif"  value="в работе" name="process">
                        <input  onclick="filterUsers(this)"  type="submit" class="user-btns_flex-btn @if ($this->filterByDidntStart) user-btns_flex-btn_active @endif"   value="не приступили" name="didntstart">
                        
                        <script>
                            function filterUsers(filter){
                               window.livewire.emit('filterUsers',filter.name)
                            }
                        </script>
                    </div>
            </div>
            <div class="admin_dashboard_users_section_content_users">
                <div class="users">
                    <div class="user-content">
                        <div class="user-content_sector">
                            <p class="user-content_sector-p">Сотрудник</p>
                            <p class="user-content_sector-p">Должность</p>
                            <p class="user-content_sector-p">Подразделение</p>
                            <p class="user-content_sector-p">Компетенции</p>
                            <p class="user-content_sector-p">Статус</p>
                        </div>
                        <hr>
                       @foreach ($users as $user)
                        @php
                            $position = $positions->where('id', $user->position_id)->first();
                            $subdivision = $user_subdivisions->where("user_id", $user->id)->first();
                            $competetion_count = count($position->competetions);
                        @endphp
                       <div class="user-content_sector">
                        <div class="user-content_sector-user">
                            <img style="width:50px;height:50px; border-radius: 50%;" src="{{ $user->avatar }}" alt="">
                            <p class="user-content_sector-user_name">{{ $user->last_name }} {{ $user->first_name }} {{ $user->fathers_name }}</p> 
                        </div>
                        <p class="user-content_sector_info">{{ $position->name }} </p>
                      <p class="user-content_sector_info">
                    {{-- {{   dd($user->subdivisions[0])}} --}}
                           
                          {{  $subdivision ? $subdivision->subdivision->name : ""}}
                    </p>
                     
                        <p class="user-content_sector_info">{{ $competetion_count }} Компетенции</p>
                        <div class="user-content_sector-status">
                            <div class="col-md-3 col-sm-6">
                                @if ($user->competetions)
<div class="progress {{ $this->getProgressBarClass($user) }}">
                                    <span class="progress-left">
                                        <span id="indicator-{{ $user->id }}" class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                        <span id="indicator-{{ $user->id }}-right"  class="progress-bar"></span>
                                    </span>
                        
                                        <div  class="progress-value">{{ count($user->competetions->where("is_done",1)) }}/{{ count($user->competetions) }}</div>
                                        <style>
                                               .progress .progress-right #indicator-{{ $user->id }}-right{
                                                    left: -100%;
                                                    border-top-left-radius: 40px;
                                                    border-bottom-left-radius: 40px;
                                                    border-right: 0;
                                                    -webkit-transform-origin: center right;
                                                    transform-origin: center right;
                                                    @if (count($user->competetions->where("is_done",1))==count($user->competetions) &&count($user->competetions->where("is_done",1)) !=0 || count($user->competetions->where("is_done",1)) >= count($user->competetions) /2 && count($user->competetions->where("is_done",1)) !=0)
                                                    transform: rotate(180deg);
                                                    @else
                                                    transform: rotate({{ count($user->competetions->where("is_done",1)) *30 }}deg);
                                                    @endif
                                                }
                                                       #indicator-{{ $user->id }}{
                                                            @if(count($user->competetions->where("is_done",1)) == count($user->competetions) && count($user->competetions->where("is_done",1)) !=0)
                                                         transform: rotate(180deg);
                                                         @elseif (count($user->competetions->where("is_done",1)) >= count($user->competetions) /2 && count($user->competetions->where("is_done",1)) !=0)
                                                    transform: rotate({{ count($user->competetions->where("is_done",1)) *60 }}deg);
                        
                                                            @else
                                                            transform: rotate(0deg);
                                                            @endif
                                                }
                                                .progress.grey .progress-bar {
                                                    border-color:#e9ecef;
                                                }
                                        </style>
                        
                                    
                                </div>
                                @endif
                            </div>
            
                           <form action="/download-reposts" class="user_changes_div">
        @csrf
        <a>  
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                <path d="M12.5 20C12.7652 20 13.0196 19.8946 13.2071 19.7071C13.3946 19.5196 13.5 19.2652 13.5 19C13.5 18.7348 13.3946 18.4804 13.2071 18.2929C13.0196 18.1054 12.7652 18 12.5 18C12.2348 18 11.9804 18.1054 11.7929 18.2929C11.6054 18.4804 11.5 18.7348 11.5 19C11.5 19.2652 11.6054 19.5196 11.7929 19.7071C11.9804 19.8946 12.2348 20 12.5 20ZM12.5 13C12.7652 13 13.0196 12.8946 13.2071 12.7071C13.3946 12.5196 13.5 12.2652 13.5 12C13.5 11.7348 13.3946 11.4804 13.2071 11.2929C13.0196 11.1054 12.7652 11 12.5 11C12.2348 11 11.9804 11.1054 11.7929 11.2929C11.6054 11.4804 11.5 11.7348 11.5 12C11.5 12.2652 11.6054 12.5196 11.7929 12.7071C11.9804 12.8946 12.2348 13 12.5 13ZM12.5 6C12.7652 6 13.0196 5.89464 13.2071 5.70711C13.3946 5.51957 13.5 5.26522 13.5 5C13.5 4.73478 13.3946 4.48043 13.2071 4.29289C13.0196 4.10536 12.7652 4 12.5 4C12.2348 4 11.9804 4.10536 11.7929 4.29289C11.6054 4.48043 11.5 4.73478 11.5 5C11.5 5.26522 11.6054 5.51957 11.7929 5.70711C11.9804 5.89464 12.2348 6 12.5 6Z" stroke="#8A92A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>    
        <input type="hidden" name="users[]" value="{{ $user->id }}" id="">
        <input type="hidden" id="changePassUser"  value="{{ $user->id }}" id="">
        <div class="user_changes">
            <div class="user_changes_content" style="    display: flex;
    flex-direction: column;
    justify-content: space-between;">
                <a class="edit_user_ref" href="/change_pass/{{ $user->id }}">Сбросить пароль
                </a>
                
                <button  class="edit_user_ref" type="submit">Выгрузка отчета по сотруднику</button>
                
            </div>
        </div>
    </form>    
                        </div>
                    </div>
                    <hr>
                       @endforeach
            
                       
                    </div>
            
                    <div class="user-sec">
                        @foreach ($users as $user)

                        <div class="user-sector">
                            <div class="user-sector-flex">
                                <img style="width:50px;height:50px; border-radius: 50%;" src="{{ $user->avatar }}" alt="">
                                <div class="">
                                    <h3>{{ $user->last_name }} {{ $user->first_name }} {{ $user->fathers_name }}</h3>
                                    <p>{{ $position->name }}</p>
                                   
                                    <p class="user-content_sector_info">  {{  $subdivision ? $subdivision->subdivision->name : ""}}</p>
                                   
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                @if ($user->competetions)
                                <div  class="progress @if(count($user->competetions->where("is_done",1)->all())>=  count($user->competetions) )   green @elseif (count($user->competetions->where("is_done",1)->all())>=  count($user->competetions)  -  count($user->competetions)/2) yellow @else pink @endif">
                                    <span class="progress-left">
                                        <span id="indicator-{{ $user->id }}" class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                        <span id="indicator-{{ $user->id }}-right"  class="progress-bar"></span>
                                    </span>
                        
                                        <div  class="progress-value">{{ count($user->competetions->where("is_done",1)) }}/{{ count($user->competetions) }}</div>
                                        <style>
                                               .progress .progress-right #indicator-{{ $user->id }}-right{
                                                    left: -100%;
                                                    border-top-left-radius: 40px;
                                                    border-bottom-left-radius: 40px;
                                                    border-right: 0;
                                                    -webkit-transform-origin: center right;
                                                    transform-origin: center right;
                                                    @if (count($user->competetions->where("is_done",1))==count($user->competetions) &&count($user->competetions->where("is_done",1)) !=0 || count($user->competetions->where("is_done",1)) >= count($user->competetions) /2 && count($user->competetions->where("is_done",1)) !=0)
                                                    transform: rotate(180deg);
                                                    @else
                                                    transform: rotate({{ count($user->competetions->where("is_done",1)) *30 }}deg);
                                                    @endif
                                                }
                                                       #indicator-{{ $user->id }}{
                                                            @if(count($user->competetions->where("is_done",1)) == count($user->competetions) && count($user->competetions->where("is_done",1)) !=0)
                                                         transform: rotate(180deg);
                                                         @elseif (count($user->competetions->where("is_done",1)) >= count($user->competetions) /2 && count($user->competetions->where("is_done",1)) !=0)
                                                    transform: rotate({{ count($user->competetions->where("is_done",1)) *60 }}deg);
                        
                                                            @else
                                                            transform: rotate(0deg);
                                                            @endif
                                                }
                                        </style>
                        
                                    
                                </div>
                                @endif
                            </div>
                        </div>

                        @endforeach
                    </div>

                </div>
                
            </div> 
            <div class="user-slider">
                {{ $users->links('livewire.pagination') }}
            </div>
        </div>
        
    </div>
    
</div>
