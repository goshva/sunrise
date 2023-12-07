<?php

namespace App\Http\Controllers;

use App\Exports\RepostsExport;
use App\Exports\UserExport;
use app\Exports\UsersExport;
use App\Imports\TestsAutoImport;
use App\Models\CompetetionLevel;
use App\Imports\PositionImport;
use App\Imports\TestImport;
use App\Imports\UserImport;
use App\Mail\PasswordMail;
use App\Models\Competetion;
use App\Models\CompetetionTest;
use App\Models\CommonTest;
use App\Models\Conversation;
use App\Models\Literature;
use App\Models\Location;
use App\Models\Message;
use App\Models\Position;
use App\Models\Subdivision;
use App\Models\SubdivisionUser;
use App\Models\Test;
use App\Models\User;
use App\Models\UserCompetetion;
use App\Models\UserNotification;
use App\Models\UserObject;
use App\Models\UserRepost;
use App\Models\UserTests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

use function PHPSTORM_META\type;

class AdminController extends Controller
{
    public $editedUser;
    public function deleteCommonTests($id)
    {
        $commonTest = CommonTest::find($id);
        $commonTestCompetetionTests = CompetetionTest::where('common_test_id', $commonTest->id)->get();
         
        if($commonTestCompetetionTests) {
foreach($commonTestCompetetionTests as $item) {
            $item->delete();
         }
            $commonTest->delete();

          return back()->with('success', 'Тест был успешно удален');
       
       
 }
   else {
    return response()->json(['message'=>'$commonTestCompetetionTests не найден']);
   }
     
    }
    public function createUser(Request $request)
    {
        // dd($request->all());
        $validate = request()->validate(
            [
                'email' => 'required|unique:users',
            ],
            [
                'email.unique' => 'Пользователь с таким email уже существует',
            ]
        );
        $position = Position::find($request->position);
        $location = Location::where('name', 'like', '%' . $request->location . '%');
           if(!$location) {
            Location::create([
                'name' => $request->location,
            ]);
           }
        $avatar_names =
            mb_substr($request->first_name, 0, 1) .
            mb_substr($request->last_name, 0, 1);
        $avatar =
            'https://ui-avatars.com/api/?name=' .
            $avatar_names .
            '&background=104772&color=fff&size=50';
        $pass = Str::password(12);
        $input = [
            'email' => $request->email,
            'password' => Hash::make($pass),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'fathers_name' => $request->fathers_name,
            'location' => $request->location,
            'position_id' => $request->position,
            'admin_user_id' => auth()->id(),
            'avatar' => $avatar,
        ];

        // dd($input);
        try {
            $user = User::create($input);
            Mail::to($user->email)->send(new PasswordMail($pass));
            if ($request->objects) {
                foreach ($request->objects as $object) {
                    UserObject::create([
                        'user_id' => $user->id,
                        'object_id' => $object,
                    ]);
                }
            }
            if ($request->subdivisions) {
                foreach ($request->subdivisions as $subdivision) {
                    SubdivisionUser::create([
                        'user_id' => $user->id,
                        'subdivision_id' => $subdivision,
                    ]);
                }
            }
            $tech_conversation = Conversation::create([
                'sender_id' => 14,
                'receiver_id' => $user->id,
                'last_time_message' => 0,
            ]);
            $quest_conversation = Conversation::create([
                'sender_id' => 15,
                'receiver_id' => $user->id,
                'last_time_message' => 0,
            ]);
            $message_tech =
                'Приветсвуем в нашей платформе ! Здесь можете задать любые вопросы , связанные с техническими данными';
            $message_quest =
                'Приветсвуем в нашей платформе ! Здесь можете задать любые вопросы , связанные с вопросами о сайте';
            Message::create([
                'sender_id' => 14,
                'receiver_id' => $user->id,
                'body' => $message_tech,
                'read' => 0,
                'type' => 'text',
                'conversation_id' => $tech_conversation->id,
            ]);
            Message::create([
                'sender_id' => 15,
                'receiver_id' => $user->id,
                'body' => $message_quest,
                'read' => 0,
                'type' => 'text',
                'conversation_id' => $quest_conversation->id,
            ]);
            return back()->with('success', 'Пользователь был успешно создан');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

public function editUser(Request $request)
    {
        // dd($request->all());
        try {
            $user = User::find($request->user_id);
           $user['email'] = $request->email;
           $user['first_name'] = $request->first_name;
           $user['last_name'] = $request->last_name;
           $user['fathers_name'] = $request->fathers_name;
           $user['location'] = $request->location;
           $location = Location::where('name', 'like', '%' . $request->user_location . '%');
           if(!$location) {
            Location::create([
                'name' => $request->location,
            ]);
           }
           $user['position_id'] = $request->position;
            if ($request->objects) {
                   $user_objects = UserObject::where(
                   'user_id',$user->id)->get();

                   foreach($user_objects as $key => $user_object) {
                        $user_objects[$key]['object_id'] = $request->objects;
                   }
            }
            if ($request->subdivisions) {
                    $subdivisionsUser = SubdivisionUser::where(
                        'user_id',$user->id)->get();
                        foreach($subdivisionsUser as $key => $subdivisionUser) {
                            $subdivisionsUser[$key]['subdivision_id'] = $request->subdivisions;
                        }
            }
            $user->save();
          return back()->with("success", "Данные пользователя успешно были изменены");
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function createLiterature(Request $request)
    {
        $file = $request->file;
        $put = Storage::disk('public')->put('literature', $file);
        $fileUrl = url('/storage/app/public/' . $put);
        $literature = Literature::create([
            'competetion_id' => $request->competetion,
            'file' => $fileUrl,
            'name' => $request->name,
        ]);
        return back()->with('success', 'Учебный материал был успешно добавлен');
    }

    public function loadTest(Request $request)
    {
          $import = new TestsAutoImport();
        $import->onlySheets('База СМТК',
            'Профиль' );
        Excel::import(
            $import,
            $request->file
        );
        return redirect(route('admin.competetion.constructor'))->with(
            'success',
            'Тесты были успешно созданы'
        );
    }

    public function updateLiterature(Request $request, $id)
    {
        $literature = Literature::find($id);
        if ($request->has('file')) {
            $file = $request->file;
            $put = Storage::disk('public')->put('literature/', $file);
            $fileUrl = url('storage/' . $put);
            $literature->file = $fileUrl;
            $literature->save();
        }
        $literature->update($request->only('name', 'competetion_id'));
        return back()->with('success', 'Учебный материал был успешно изменен');
    }

  
    public function appointCompetetion(Request $request)
    {
       
        
        if ($request->subdivisions[0] != null) {
            try {
                if (strlen($request->competetion > 3)) {
                    $competetions = explode(',', $request->competetion);
                    foreach ($competetions as $competetion) {
                        
                        if($request->created_type == 'auto_create') {
                    $competetion_test = CommonTest::find($competetion);
                    } else {
                    $competetion_test = CompetetionTest::find($competetion);
                    }
                 $competetion = $competetion_test->competetion;  
                        if ($request->subdivisions[0] != null) {
                            $subdivisions = explode(
                                ',',
                                $request->subdivisions[0]
                            );
                            foreach ($subdivisions as $subdivision) {
                                $subdivision = Subdivision::find($subdivision);

                                foreach ($subdivision->users as $user) {
                    
                    // if(request('created_type') == 'auto_create') {
                    //     $competetion_test = CommonTest::find(
                    //     (int) $competetion
                        
                    // );
                    // } else {
                    //     $competetion_test = CompetetionTest::find(
                    //     (int) $competetion
                    // );
                    // }
                    $competetion_test_count = 0;
                    $competetion = $competetion_test->competetion;
                    $testsArr = [];

                    
                    foreach ($competetion_test->tests as $key => $test) {
                        $competetionIndicator = $test->indicator;
                       $competetionLevel = CompetetionLevel::where('competetion_id',  $competetion->id)->where('position_id', $user->position->id)->where('level', $competetionIndicator->level)->first();
                       
                       if($competetionLevel != null && $competetionLevel->level == $test->indicator->level) {
                           $competetion_test_count++;
                        $userTest = UserTests::where('user_id', $user->id)->where('position_id',$user->position->id)->where('level',$competetionLevel->level)
                            ->where('test_id', $test->id)
                            ->first();
                        if (!$userTest && $competetionLevel->level == $test->indicator->level) {
                           $userTest = UserTests::create([
                                'user_id' => $user->id,
                                'test_id' => $test->id,
                                'competetion_id' => $competetion->id,
                                'position_id' => $user->position->id,
                                'level' => $competetionLevel->level,
                            ]);

                    
                            
                        }
                        $testsArr[$key] = $userTest;
           }
                        
                    
                }
                                    $competetion_max_points = 0;
                    if ($competetion_test_count == 2) {
                        $competetion_max_points = 15;
                    } elseif ($competetion_test_count == 3) {
                        $competetion_max_points = 22.5;
                    } elseif ($competetion_test_count == 4) {
                        $competetion_max_points = 30;
                    } elseif ($competetion_test_count == 5) {
                        $competetion_max_points = 37.5;
                    }
                    $user_competetion = UserCompetetion::where(
                        'user_id',
                        $user->id
                    )
                        ->where('competetion_id', $competetion->id)
                        ->first();
                    if ($user_competetion) {
                        $user_competetion->date_from = $request->date_from;
                        $user_competetion->date_to = $request->date_to;
                        $user_competetion->max_points = $competetion_max_points;
                        $user_competetion->save();
                    } else {
                        UserCompetetion::create([
                            'user_id' => $user->id,
                            'competetion_id' => $competetion->id,
                            'competetion_test_id' => $competetion_test->id,
                            'common_test_id' => request('created_type') == 'auto_create' ?  $competetion_test->id : null,
                            'max_points' => $competetion_max_points,
                            'date_from' => $request->date_from,
                            'date_to' => $request->date_to,
                            'progress' => 0,
                        ]);
                        UserNotification::create([
                                'user_id' => $user->id,
                                'notification' =>
                                    'Уважаемый пользователь, вам назначено новое тестирование.',
                            ]);
                    }
                                }
                            }
                        }
                        }
                    
                }
                return redirect(
                    route('admin.tests')
                )->with(
                    'success',
                    'Тест успешно был назначен всем пользователям в выбранных подразделениях '
                );
            } catch (\Throwable $th) {
                dd($th);
            }
        }
        if ($request->for_competetions_user) {
            try {
                $for_competetions_user = explode(
                    ',',
                    $request->for_competetions_user
                );
                foreach ($for_competetions_user as $competetion) {
                    
                    if(request('created_type') == 'auto_create') {
                        $competetion_test = CommonTest::find(
                        (int) $competetion
                        
                    );
                    } else {
                        $competetion_test = CompetetionTest::find(
                        (int) $competetion
                    );
                    }
                    // dd($competetion_test->tests);
                    $competetion_test_count = 0;
                    $competetion = $competetion_test->competetion;
                    $testsArr = [];
                    $user = User::find($request->user);

                    // dd($request->all());
                    foreach ($competetion_test->tests as $key => $test) {
                        $competetionIndicator = $test->indicator;
                        // dd($test);
                       $competetionLevel = CompetetionLevel::where('competetion_id',  $competetion->id)->where('position_id', $user->position->id)->where('level', $competetionIndicator->level)->first();
                       
                       if($competetionLevel != null && $competetionLevel->level == $test->indicator->level) {
                           $competetion_test_count++;
                        $userTest = UserTests::where('user_id', $user->id)->where('position_id',$user->position->id)->where('level',$competetionLevel->level)
                            ->where('test_id', $test->id)
                            ->first();
                        if (!$userTest && $competetionLevel->level == $test->indicator->level) {
                           $userTest = UserTests::create([
                                'user_id' => $user->id,
                                'test_id' => $test->id,
                                'competetion_id' => $competetion->id,
                                'position_id' => $user->position->id,
                                'level' => $competetionLevel->level,
                            ]);

                    
                            
                        }
                        $testsArr[$key] = $userTest;
           }
                        
                    
                }
                                    $competetion_max_points = 0;
                    if ($competetion_test_count == 2) {
                        $competetion_max_points = 15;
                    } elseif ($competetion_test_count == 3) {
                        $competetion_max_points = 22.5;
                    } elseif ($competetion_test_count == 4) {
                        $competetion_max_points = 30;
                    } elseif ($competetion_test_count == 5) {
                        $competetion_max_points = 37.5;
                    }
                    $user_competetion = UserCompetetion::where(
                        'user_id',
                        $user->id
                    )
                        ->where('competetion_id', $competetion->id)
                        ->first();
                    if ($user_competetion) {
                        $user_competetion->date_from = $request->date_from;
                        $user_competetion->date_to = $request->date_to;
                        $user_competetion->max_points = $competetion_max_points;
                        $user_competetion->save();
                    } else {
                        UserCompetetion::create([
                            'user_id' => $user->id,
                            'competetion_id' => $competetion->id,
                            'competetion_test_id' => $competetion_test->id,
                            'common_test_id' => request('created_type') == 'auto_create' ?  $competetion_test->id : null,
                            'max_points' => $competetion_max_points,
                            'date_from' => $request->date_from,
                            'date_to' => $request->date_to,
                            'progress' => 0,
                        ]);
                        UserNotification::create([
                                'user_id' => $user->id,
                                'notification' =>
                                    'Уважаемый пользователь, вам назначено новое тестирование.',
                            ]);
                    }
                }
                
                return redirect(route('admin.tests'))->with(
                    'success',
                    'Тесты успешно были назначены пользователю ' .
                        $user->first_name .
                        ' ' .
                        $user->last_name .
                        ' ' .
                        $user->fathers_name
                );
            } catch (\Throwable $th) {
                dd($th);
            }
        }
        if ($request->for_competetion) {
            $competetion_test = CompetetionTest::find($request->competetion);
           /* if($request->created_type == 'auto_create') {
                    $competetion_test = CommonTest::find($request->competetion);
                    } else {
                    $competetion_test = CompetetionTest::find($request->competetion);
                    }*/
            $competetion = $competetion_test->competetion;
            try {
                if ($request->competetion) {
                    // dd(true);
                    foreach ($competetion->positions as $position) {
                        foreach ($position->users as $user) {
                            foreach ($competetion_test->tests as $test) {
                                foreach($competetion->indicators as $competetionIndicator) {
           $competetionLevel = CompetetionLevel::where('competetion_id',  $competetion->id)->where('position_id', $user->position->id)->where('level', $competetionIndicator->level)->first();
           if($competetionLevel != null) {
             foreach($test->indicator as $test_indicator) {
                                 if($test_indicator->level == $competetionLevel->level) {
                                $userTest = UserTests::where(
                                    'user_id',
                                    $user->id
                                )->where('position_id',$user->position->id)->where('level',$competetionLevel->level)
                                    ->where('test_id', $test->id)
                                    ->first();
                                if (!$userTest) {
                                    UserTests::create([
                                        'user_id' => $user->id,
                                        'test_id' => $test->id,
                                        'competetion_id' =>
                                            $test->competetion->id,
                                    'position_id' => $user->position->id,
                                    'level' => $competetionLevel->level
                                    ]);
$competetion_max_points = 0;
                    if (count($competetion_test->tests) == 2) {
                        $competetion_max_points = 15;
                    } elseif (count($competetion_test->tests) == 3) {
                        $competetion_max_points = 22.5;
                    } elseif (count($competetion_test->tests) == 4) {
                        $competetion_max_points = 30;
                    } elseif (count($competetion_test->tests) == 5) {
                        $competetion_max_points = 37.5;
                    }
                    $user_competetion = UserCompetetion::where(
                        'user_id',
                        $user->id
                    )
                        ->where('competetion_id', $competetion->id)
                        ->first();
                    if ($user_competetion) {
                        $user_competetion->date_from = $request->date_from;
                        $user_competetion->date_to = $request->date_to;
                        $user_competetion->max_points = $competetion_max_points;
                        $user_competetion->save();
                    } else {
                        UserCompetetion::create([
                            'user_id' => $user->id,
                            'competetion_id' => $competetion->id,
                            'competetion_test_id' => $competetion_test->id,
                            'max_points' => $competetion_max_points,
                            'date_from' => $request->date_from,
                            'date_to' => $request->date_to,
                            'progress' => 0,
                        ]);
                    }
                                    UserNotification::create([
                                        'user_id' => $user->id,
                                        'notification' =>
                                            'Уважаемый пользователь, вам назначено новое тестирование.',
                                    ]);
                                }
                            }
                        }
                    }
                }
                        }
                        }
                    }
                    return redirect(route('admin.tests'))->with(
                        'success',
                        'Тест успешно был назначен ко всем пользователям в компетенции ' .
                            $test->competetion->name
                    );
                }
            } catch (\Throwable $th) {
                dd($th);
            }
        }
          dd($request->all());
            try {
                $competetion = $request->competetion;
              
                    
                    if(request('created_type') == 'auto_create') {
                        $competetion_test = CommonTest::find(
                        (int) $competetion
                        
                    );
                    } else {
                        $competetion_test = CompetetionTest::find(
                        (int) $competetion
                    );
                    }
                    $competetion_test_count = 0;
                    $competetion = $competetion_test->competetion;
                    $testsArr = [];
                    $user = User::find($request->user);

                    // 
                    foreach ($competetion_test->tests as $key => $test) {
                        $competetionIndicator = $test->indicator;
                       $competetionLevel = CompetetionLevel::where('competetion_id',  $competetion->id)->where('position_id', $user->position->id)->where('level', $competetionIndicator->level)->first();
                       
                       if($competetionLevel != null && $competetionLevel->level == $test->indicator->level) {
                           $competetion_test_count++;
                        $userTest = UserTests::where('user_id', $user->id)->where('position_id',$user->position->id)->where('level',$competetionLevel->level)
                            ->where('test_id', $test->id)
                            ->first();
                        if (!$userTest && $competetionLevel->level == $test->indicator->level) {
                           $userTest = UserTests::create([
                                'user_id' => $user->id,
                                'test_id' => $test->id,
                                'competetion_id' => $competetion->id,
                                'position_id' => $user->position->id,
                                'level' => $competetionLevel->level,
                            ]);

                    
                            
                        }
                        $testsArr[$key] = $userTest;
           }
                        
                    
                }
                                    $competetion_max_points = 0;
                    if ($competetion_test_count == 2) {
                        $competetion_max_points = 15;
                    } elseif ($competetion_test_count == 3) {
                        $competetion_max_points = 22.5;
                    } elseif ($competetion_test_count == 4) {
                        $competetion_max_points = 30;
                    } elseif ($competetion_test_count == 5) {
                        $competetion_max_points = 37.5;
                    }
                    $user_competetion = UserCompetetion::where(
                        'user_id',
                        $user->id
                    )
                        ->where('competetion_id', $competetion->id)
                        ->first();
                    if ($user_competetion) {
                        $user_competetion->date_from = $request->date_from;
                        $user_competetion->date_to = $request->date_to;
                        $user_competetion->max_points = $competetion_max_points;
                        $user_competetion->save();
                    } else {
                        UserCompetetion::create([
                            'user_id' => $user->id,
                            'competetion_id' => $competetion->id,
                            'competetion_test_id' => $competetion_test->id,
                            'common_test_id' => request('created_type') == 'auto_create' ?  $competetion_test->id : null,
                            'max_points' => $competetion_max_points,
                            'date_from' => $request->date_from,
                            'date_to' => $request->date_to,
                            'progress' => 0,
                        ]);
                        UserNotification::create([
                                'user_id' => $user->id,
                                'notification' =>
                                    'Уважаемый пользователь, вам назначено новое тестирование.',
                            ]);
                    }
                
                
                return redirect(route('admin.tests'))->with(
                    'success',
                    'Тесты успешно были назначены пользователю ' .
                        $user->first_name .
                        ' ' .
                        $user->last_name .
                        ' ' .
                        $user->fathers_name
                );
            } catch (\Throwable $th) {
                dd($th);
            }
        
        return redirect(route('admin.tests'))->with(
            'success',
            'Тест успешно был назначен пользователю ' .
                $user->first_name .
                ' ' .
                $user->last_name .
                ' ' .
                $user->fathers_name
        );
    }
    public function addConstructorDate(Request $request)
    {
        // dd($request->all());
        $competetion = Competetion::find($request->competetion);
        $competetion_max_points = 0;
        if (count($competetion->indicators) == 2) {
            $competetion_max_points = 15;
        } elseif (count($competetion->indicators) == 3) {
            $competetion_max_points = 22.5;
        } elseif (count($competetion->indicators) == 4) {
            $competetion_max_points = 30;
        } elseif (count($competetion->indicators) == 4) {
            $competetion_max_points = 37.5;
        }
        foreach ($competetion->positions as $position) {
            foreach ($position->users as $user) {
                $user_competetion = UserCompetetion::where('user_id', $user->id)
                    ->where('competetion_id', $competetion->id)
                    ->first();
                if ($user_competetion) {
                    $user_competetion->date_from = $request->date_from;
                    $user_competetion->date_to = $request->date_to;
                    $user_competetion->max_points = $competetion_max_points;
                    $user_competetion->save();
                } else {
                    UserCompetetion::create([
                        'user_id' => $user->id,
                        'competetion_id' => $request->competetion,
                        'competetion_test_id' => $competetion_test->id,
                        'max_points' => $competetion_max_points,
                        'date_from' => $request->date_from,
                        'date_to' => $request->date_to,
                        'progress' => 0,
                    ]);
                }
            }
        }
        return back()->with(
            'success',
            'Сроки для компетенции были успешно добавлены'
        );
    }

    public function deleteTest($id)
    {
        $test = Test::find($id);
        $test->delete();
        return back()->with('success', 'Тест был успешно удален');
    }

public function downloadReposts(Request $request)
{
     $maxSubdivisions = 0;
    foreach ($request->users as $find_user) {
        $userSubdivisionsCount = User::find($find_user)->subdivisions->count();
        if ($userSubdivisionsCount > $maxSubdivisions) {
            $maxSubdivisions = $userSubdivisionsCount;
        }
    }
    $users = [];
    foreach ($request->users as $find_user) {
        UserRepost::create([
            'user_id' => $find_user,
        ]);
        $user = User::find($find_user);
        $competetionsArr = $user->competetions;

        if (!$competetionsArr) {
            $competetionsArr = [['name' => '', 'is_done' => '', 'performance' => '', 'text' => '', 'updated_at' => '']];
        }
        $subdivisionsArr = $user->subdivisions->pluck('name')->toArray();
        $subdivisionsStr = implode(", ", $subdivisionsArr); // Concatenate subdivision names

        foreach ($competetionsArr as $competetion) {
            // dd($competetion->competetionTest->tests);
            $competetion_id = $competetion->competetion_id ?? null;
            $this_tests = UserTests::where("user_id", $user->id)->with(['test.commonTest', 'test.competetionTest'])
                ->whereHas('test', function ($query) use ($competetion) {
                    $query->whereHas('commonTest', function ($query) use ($competetion) {
                        $query->where('common_test_id', $competetion->common_test_id ?? null);
                    })->orWhereHas('competetionTest', function ($query) use ($competetion) {
                        $query->where('competetion_test_id', $competetion->competetion_test_id ?? null);
                    });
                })->where("competetion_id", $competetion->competetion_id)->get();
                 $competetionLevel = CompetetionLevel::where('competetion_id',  $competetion->competetion->id)->where('position_id', $user->position->id)->first();
                // dd($this_tests);
                                  $competetion_level = 0;
                        if(count($this_tests) == 2){
                            if($competetionLevel->level == 1){
                                $competetion_level = 1;
                            }elseif($competetionLevel->level == 2){
                                $competetion_level = 3;
                            }elseif($competetionLevel->level == 3){
                                $competetion_level = 6;
                            }elseif($competetionLevel->level == 4){
                                $competetion_level = 10;
                            }elseif($competetionLevel->level == 5){
                                $competetion_level = 15;
                            }
                        }elseif(count($this_tests) == 3){
                            if($competetionLevel->level == 1){
                                $competetion_level = 1.5;
                            }elseif($competetionLevel->level == 2){
                                $competetion_level = 4.5;
                            }elseif($competetionLevel->level == 3){
                                $competetion_level = 9;
                            }elseif($competetionLevel->level == 4){
                                $competetion_level = 15;
                            }elseif($competetionLevel->level == 5){
                                $competetion_level = 22.5;
                            }
                        }elseif(count($this_tests) == 4){
                            if($competetionLevel->level == 1){
                                $competetion_level = 2;
                            }elseif($competetionLevel->level == 2){
                                $competetion_level = 6;
                            }elseif($competetionLevel->level == 3){
                                $competetion_level = 12;
                            }elseif($competetionLevel->level == 4){
                                $competetion_level = 20;
                            }elseif($competetionLevel->level == 5){
                                $competetion_level = 30;
                            }
                        }elseif(count($this_tests) == 5){
                           if($competetionLevel->level == 1){
                                $competetion_level = 2.5;
                            }elseif($competetionLevel->level == 2){
                                $competetion_level = 7.5;
                            }elseif($competetionLevel->level == 3){
                                $competetion_level = 17.5;
                            }elseif($competetionLevel->level == 4){
                                $competetion_level = 25;
                            }elseif($competetionLevel->level == 5){
                                $competetion_level = 37.5;
                            }
                        }
            foreach ($this_tests as $user_test) {
                          

                  $level = 0;

                        
                 if($user_test->test->indicator->level == 1){
                                    $level = 0.5;
                                }elseif($user_test->test->indicator->level == 2){
                                $level = 1.5;
                                }elseif($user_test->test->indicator->level == 3){
                                $level = 3;
                                }elseif($user_test->test->indicator->level == 4){
                                $level = 5;
                                }elseif($user_test->test->indicator->level == 5){
                                $level = 7.5;
                                }
                $competetion_item = isset($competetion['competetion_id']) ? Competetion::find($competetion['competetion_id']) : null;
                $competetion_date = isset($competetion['updated_at']) ? date("d.m.Y h:i:s", strtotime($competetion['updated_at'])) : '';
            $userData = [
            'ФИО' => $user->last_name . ' ' . $user->first_name . ' ' . $user->fathers_name,
            'Email' => $user->email,
            'Должность' => $user->position->name,
            'object' => isset($user->objects[0]) ? $user->objects[0]->name : '',
        ];

        // Add dynamic subdivision columns
        for ($i = 1; $i <= $maxSubdivisions; $i++) {
            $userData["Подразделение$i"] = $subdivisionsArr[$i - 1] ?? '';
        }

        // Continue with other data after subdivisions
        $userData['competetion_name'] =$competetion_item ? $competetion_item->name : '';
        $userData['Индикатор'] = $user_test->test->indicator->name; 
        $userData['Статус'] = isset($competetion['is_done']) && $competetion['is_done']  == 1 ? 'Закончено' : 'Не закончено'; 
         $userData['Профиль'] =$competetion_level;
         
       
        $userData['Баллы'] = $user_test->points == 0 ||$user_test->points == "" ? "0" : $user_test->points;
        $userData['Результат'] =$user_test['text'] ?? ''; 
        $userData['Дата'] = $competetion_date; 
                // $userData = [
                //     'first_name' => $user->last_name . ' ' . $user->first_name . ' ' . $user->fathers_name,
                //     'email' => $user->email,
                //     'position' => $user->position->name,
                //     'object' => $user->objects->pluck('name')->implode(", "), // Assuming user can have multiple objects
                    
                //     'competetion_name' => $competetion_item ? $competetion_item->name : '',
                //     'indicator_name' => $user_test->test->indicator->name,
                //     'is_done' => isset($competetion['is_done']) ? 'Закончено' : 'Не закончено',
                //     'performance' => $competetion['performance'] ?? '',
                //     'text' => $competetion['text'] ?? '',
                //     'date' => $competetion_date,
                // ];
      

      

                if ($user->position->name != 'Поддержка') {
                    $users[] = $userData;
                }
            }
        }
    }

    return Excel::download(new RepostsExport($users,$maxSubdivisions), 'users.xlsx');
}


    public function deleteLiterature($id)
    {
        $literature = Literature::find($id);
        $literature->delete();
        return back()->with('success', 'Учебный материал был успешно удален');
    }

    public function ChangeRole(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->role_admin) {
            $user->role_id = 2;
            $user->save();
        } elseif ($request->role_student) {
            $user->role_id = 1;
            $user->save();
        }elseif ($request->role_rukovoditel) {
            $user->role_id = 4;
            $user->save();
        }
        return back()->with('success', 'Роль была успешно изменена');
    }

    public function loadUser(Request $request)
    {
        Excel::import(new UserImport(), $request->file);
        return redirect(route('admin.users'))->with(
            'success',
            'Пользователи были успешно созданы'
        );
    }

    public function ChangePass($id)
    {
        $user = User::find($id);
        $pass = Str::password(12);
        $user->password = Hash::make($pass);
        $user->save();
        Mail::to($user->email)->send(new PasswordMail($pass));
        return back()->with(
            'success',
            'Пароль был успешно отправлен на почту пользователя'
        );
    }

    public function loadPosition(Request $request)
    {
        Excel::import(new PositionImport(), $request->file);
        return redirect(route('admin.positions'))->with(
            'success',
            'Должности были успешно созданы'
        );
    }

    public function deleteCompetetionTests($id)
    {
        $competetionTest = CompetetionTest::find($id);
        $competetionTest->delete();
        return back()->with('success', 'Тест был успешно удален');
    }

    public function downloadRepostAgain(Request $request)
    {
        $user_reposts = explode(',', $request->downloadRepostAgainInp);
        foreach ($user_reposts as $user_repost) {
            $user_repost = UserRepost::find($user_repost);
            $user = $user_repost->user;
            $user_repost->delete();
            UserRepost::create([
                'user_id' => $user->id,
            ]);
            $objects = [];
            if ($user->objects) {
                foreach ($user->objects as $object) {
                    $objects[] = [
                        '' => '',
                        'Блок' => 'Блок № ' . $object->id,
                        'name' => $object->name,
                    ];
                }
            }
            $subdivisions = [];
            if ($user->subdivisions) {
                foreach ($user->subdivisions as $subdivision) {
                    $subdivisions[] = [
                        '' => '',
                        'Подрозделение' =>
                            'Подрозделение № ' . $subdivision->id,
                        'name' => $subdivision->name,
                    ];
                }
            }
            $competetions = [];
            if ($user->competetions) {
                foreach ($user->competetions as $competetion) {
                    // dump($competetion);
                    $competetions[] = [
                        '' => '',
                        'com_name' =>
                            'Компетенция' . $competetion->competetion->id,
                        'name' => $competetion->competetion->name,
                        'performance' => $competetion->performance . '%',
                        'is_done' => $competetion->is_done
                            ? 'Закончено'
                            : 'Не закончено',
                        'text' => $competetion->text,
                    ];
                }
            }
            $tests = [];
            if ($competetions !== []) {
                foreach ($competetions as $competetion) {
                    $user_tests = UserTests::where(
                        'competetion_id',
                        substr($competetion['com_name'], -1)
                    )->get();
                    foreach ($user_tests as $user_test) {
                        $tests[] = [
                            '' => '',
                            'id' =>
                                'Тест по компетенции ' . $competetion['name'],
                            'name' => $user_test->test->indicator->name,
                            'performance' => $user_test->performance . '%',
                            'text' => $user_test->text,
                        ];
                    }
                }
            }
            $user = [
                'id' => 'Пользователь № ' . $user->id,
                'first_name' =>
                    $user->last_name .
                    ' ' .
                    $user->first_name .
                    ' ' .
                    $user->fathers_name,
                'email' => $user->email,
                'position' => $user->position->name,
            ];
            $users[] = [
                $user,
                ...$objects,
                ...$subdivisions,
                ...$competetions,
                ...$tests,
            ];
        }

        // dd($users);
        Excel::download(new UserExport($users), 'users.xlsx');
        return redirect('/admin/reposts?old=true')->with(
            'success',
            'Отчеты по пользователю были успешно скачаны'
        );
    }
}
