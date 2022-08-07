## PRUEBA FULLSTACK PHP

## Requisitos
PHP version 8.0 o superior.
MySQL para la Base de Datos
Postman para realizar las pruebas

## 1.- Maual de instalación
1.1- configución del archivo **.env**
```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=mydb
    DB_USERNAME=username <- Reemplazar por su nombre de usuario
    DB_PASSWORD=password <- Reemplazar por la contraseña de su usuario
```
1.2.- Crear una base de datos con el nombre mydb en MySQL

1.3.- Ejecutar los siguientes comandos en el mismo orden dentro de la carpeta raíz del proyecto
```
    1.3.1- composer install
    1.3.2- php artisan migrate
    1.3.3- php artisan serve
```

## 2.- Manual para realizar las pruebas
Ejecutar postman realizar las siguientes configuraciones y ejecutar correctamente las pruebas

## 2.1- Registrar nuevo usuario e iniciar sesión
   ## 2.1.1 Registro:
```
    -Metodo: POST
    -URL: http://127.0.0.1:8000/api/register
    -Headers:
        KEY: Accept VALUE: application/json
        KEY: Content-Type VALUE: application/json
    -Body
        KEY: name VALUE: nombre_de_usuario
        KEY: email VALUE: correo_del_usuario
        KEY: password VALUE: contraseña_del_usuario (Minimo 8 caracteres)
```   
    Pressionar SEND

----------------------------------------------------------------------------------------------
    
   ## 2.1.2 Iniciar sesión:
```
    -Metodo: POST
    -URL: http://127.0.0.1:8000/api/login
    -Headers:
        KEY: Accept VALUE: application/json
        KEY: Content-Type VALUE: application/json
    -Body
        KEY: email VALUE: correo_del_usuario
        KEY: password VALUE: contraseña_del_usuario
 ```   
    Pressionar SEND

----------------------------------------------------------------------------------------------
    
   ## 2.1.3 Cerrar sesión:
```
    -Metodo: POST
    -URL: http://127.0.0.1:8000/api/logout
    -Authorization:
        TYPE: Bearer Token
        TOKEN: utilizar el token proporcionado al iniciar sesión
    -Headers:
        KEY: Accept VALUE: application/json
        KEY: Content-Type VALUE: application/json
    -Body
        KEY: email VALUE: correo_del_usuario
        KEY: password VALUE: contraseña_del_usuario
```   
    Pressionar SEND

----------------------------------------------------------------------------------------------

## 2.2- Registrar y eliminar región
   ## 2.2.1 Registrar región:
```
    -Metodo: POST
    -URL: http://127.0.0.1:8000/api/region
    -Authorization:
        TYPE: Bearer Token
        TOKEN: utilizar el token proporcionado al iniciar sesión
    -Headers:
        KEY: Accept VALUE: application/json
        KEY: Content-Type VALUE: application/json
    -Body
        KEY: description VALUE: descripción de la región
```    
    Pressionar SEND

----------------------------------------------------------------------------------------------

   ## 2.2.2 Eliminar región:
```
    -Metodo: DELETE
    -URL: http://127.0.0.1:8000/api/region/1 <-  reemplazar el 1 por el id de la región que desea eliminar
    -Authorization:
        TYPE: Bearer Token
        TOKEN: utilizar el token proporcionado al iniciar sesión
    -Headers:
        KEY: Accept VALUE: application/json
        KEY: Content-Type VALUE: application/json
```   
    Pressionar SEND

----------------------------------------------------------------------------------------------

## 2.3- Registrar y eliminar commune
   ## 2.3.1 Registrar commune:
```
    -Metodo: POST
    -URL: http://127.0.0.1:8000/api/commune
    -Authorization:
        TYPE: Bearer Token
        TOKEN: utilizar el token proporcionado al iniciar sesión
    -Headers:
        KEY: Accept VALUE: application/json
        KEY: Content-Type VALUE: application/json
    -Body
        KEY: region VALUE: id de la region a la que pertenece la commune
        KEY: description VALUE: descripción de la commune
```    
    Pressionar SEND

----------------------------------------------------------------------------------------------
   
   ## 2.3.2 Eliminar commune:
```
    -Metodo: DELETE
    -URL: http://127.0.0.1:8000/api/commune/1 <-  reemplazar el 1 por el id de la commune que desea eliminar
    -Authorization:
        TYPE: Bearer Token
        TOKEN: utilizar el token proporcionado al iniciar sesión
    -Headers:
        KEY: Accept VALUE: application/json
        KEY: Content-Type VALUE: application/json
```    
    Pressionar SEND

----------------------------------------------------------------------------------------------

## 2.4.- Registrar, consultar y eliminar customer
   ## 2.4.1 Registrar customer:
```
    -Metodo: POST
    -URL: http://127.0.0.1:8000/api/customer
    -Authorization:
        TYPE: Bearer Token
        TOKEN: utilizar el token proporcionado al iniciar sesión
    -Headers:
        KEY: Accept VALUE: application/json
        KEY: Content-Type VALUE: application/json
    -Body
        KEY: dni VALUE: dni del customer
        KEY: region VALUE: region a la que pertenece el customer
        KEY: commune VALUE: commune a la que pertenece el customer
        KEY: email VALUE: email del customer
        KEY: name VALUE: nombre(s) del customer
        KEY: last_name VALUE: apellido(s) del customer
        KEY: address VALUE: dirección del customer (este campo puede dejarse vacío)
```    
    Pressionar SEND

----------------------------------------------------------------------------------------------
  
   ## 2.4.2 Consultar todas los customers:
```
    -Metodo: GET
    -URL: http://127.0.0.1:8000/api/customers
    -Authorization:
        TYPE: Bearer Token
        TOKEN: utilizar el token proporcionado al iniciar sesión 
    -Headers:
        KEY: Accept VALUE: application/json
```    
    Pressionar SEND

----------------------------------------------------------------------------------------------
  
   ## 2.4.2 Consultar un customers especifico:
```
    -Metodo: GET
    -URL: http://127.0.0.1:8000/api/customer/prueba@gmail.com <- reemplazar por el dni o email del customer que desea consultar
    -Authorization:
        TYPE: Bearer Token
        TOKEN: utilizar el token proporcionado al iniciar sesión 
    -Headers:
        KEY: Accept VALUE: application/json
```    
    Pressionar SEND

----------------------------------------------------------------------------------------------
   
   ## 2.4.4 Eliminar customer:
```
    -Metodo: DELETE
    -URL: http://127.0.0.1:8000/api/customer/123456789 <- reemplazar por el dni del customer que desea eliminar
    -Authorization:
        TYPE: Bearer Token
        TOKEN: utilizar el token proporcionado al iniciar sesión 
    -Headers:
        KEY: Accept VALUE: application/json
```    
    Pressionar SEND

----------------------------------------------------------------------------------------------

## 3.- Descripción de metodos y funciones

Se crearon las migraciones para la BD de proporcionada, se utilizaron las migraciones de las tablas de usuarios por defecto de laravel y se creó una migración para una tabla que almacenará los logs
```
    2014_10_12_000000_create_users_table 
    2014_10_12_100000_create_password_resets_table 
    2019_08_19_000000_create_failed_jobs_table 
    2019_12_14_000001_create_personal_access_tokens_table 
    2022_08_05_222636_create_regions_table 
    2022_08_05_222926_create_communes_table 
    2022_08_05_224005_create_customers_table 
    2022_08_06_200940_create_log_activity_table
```
## Users
Controlador: **AuthController.php**
Para registrar los usuarios se realiza una validación a través del Middlaware **UserValidation.php** y posteriormente se guarda el registro, se inicia sesión de manera automatica y se genera un token con un timepo de vida de 60 min.

En el Middlaware **UserValidation.php** se validará lo siguiente:
    nombre: debe ser obligatorio, de tipo string y con una longitud máxima de 255 caracteres.
    email: debe ser obligatorio, de tipo string, con una longitud máxima de 255 caracteres y deberá ser único en la tabla users.
    password: debe ser obligatorio, de tipo string y con una longitud mínima de 8 caracteres.

Código de **UserValidation.php**:
```
public function handle(Request $request, Closure $next)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            \LogActivity::addToLog($validator->errors());
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        return $next($request);
    }
```
Código de **AuthController.php**:
```
public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token',$request->email)->plainTextToken;
        \LogActivity::addToLog('New registered user');
        return response()
            ->json([
                'status' => true,
                'data' => $user, 
                'access_token' => $token, 
                'token_type' => 'Bearer',
            ]);
    }
```
Para realizar el login se valida que el email y password sean correctos de lo contrario retornará un false y el mensaje "Unauthorized login". Si el email y password son correctos se generará un token con un tiempo de vida de 60 min. 

Código de **AuthController.php**:
```
public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email','password'))){
            \LogActivity::addToLog('Unauthorized login');
            return response()->json(['status' => false,'message' => 'Unauthorized login'], 401);
        }
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token',$request['email'])->plainTextToken;
        \LogActivity::addToLog('Login: '.$user->name);
        return response()
            ->json([
                'status' => true,
                'message' => 'Hi '.$user->name,
                'accessToken' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ]);
    }
```
## Regions
Controlador: **RegionController.php**
La consulta de las regiones retornara un true y todas la regiones existentes

Código de **RegionController.php**:
```
public function index()
    {
        $regions = Region::all();
        return response()->json(['status' => true, 'data' => $regions]);
    }
```
Para registrar nuevas regiones se realiza una validación a través del Middlaware **RegionValidation.php**
En el Middlaware **RegionValidation.php** se validará lo siguiente:
    description: debe ser obligatorio, de tipo string, con una longitud máxima de 90 caracteres

Código de **RegionValidation.php**:
```
public function handle(Request $request, Closure $next)
    {
        $validator = Validator::make($request->all(),[
            'description' => 'required|string|max:90'
        ]);

        if($validator->fails()){
            \LogActivity::addToLog($validator->errors());
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        
        return $next($request);
    }
```
Código de **RegionController.php**:
```
public function store(Request $request)
    {
        $region = Region::create([
            'description' => $request->description
        ]);
        \LogActivity::addToLog('New region added');
        return response()->json(['status' => true, 'data' => $region]);
    }
```
Para la eliminación de una región primero se consultara que exista, si la region no existe se retornará un false y el mensaje "Region doesn't exists and can't be deleted". Si la region a eliminar existe, se eliminará, se retornara un true y el mensaje "Region deleted".

Código de **RegionController.php**:
```
public function destroy(Request $request)
    {
        $region = Region::where('id_ref',$request->id)->count();
        if ($region === 0) {
            \LogActivity::addToLog("Region doesn't exists and can't be deleted");
            return response()->json(['status' => false, 'message' => "Region doesn't exists and can't be deleted"]);
        }else{
            $region = Region::destroy($request->id);
            \LogActivity::addToLog('Region deleted');
            return response()->json(['status' => true, 'message' => "Region deleted"]);
        }
    }
```
## Communes
Controlador: **CommuneController.php**
La consulta de las Communes retornara un true y todas la regiones existentes

Código de **CommuneController.php**:
```
public function index()
    {
        $communes = Commune::all();
        return response()->json(['status' => true, 'data' => $communes]);
    }
```
Para registrar nuevas Communes se realiza una validación a través del Middlaware **CommuneValidation.php**
En el Middlaware **CommuneValidation.php** se validará lo siguiente:
    region: debe ser obligatorio, de tipo integer y deberá existir en la tabla regions
    description: debe ser obligatorio, de tipo string, con una longitud máxima de 90 caracteres

Código de **CommuneValidation.php**:
```
public function handle(Request $request, Closure $next)
    {
        $validator = Validator::make($request->all(),[
            'region' => 'required|integer|exists:regions,id_reg',
            'description' => 'required|string|max:90'
        ]);
        if($validator->fails()){
            \LogActivity::addToLog($validator->errors());
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        return $next($request);
    }
```
Para la eliminación de una Commune primero se consultara que exista, si la Commune no existe se retornará un false y el mensaje "Commune doesn't exists and can't be deleted". Si la Commune a eliminar existe, se eliminará, se retornara un true y el mensaje "Commune deleted".

Código de **CommuneController.php**:
```
public function destroy(Request $request)
    {
        $commune = Commune::where('id_com',$request->id)->count();
        if ($commune === 0) {
            \LogActivity::addToLog("Commune doesn't exists and can't be deleted");
            return response()->json(['status' => false, 'message' => "Commune doesn't exists and can't be deleted"]);
        }else{
            $commune = Commune::destroy($request->id);
            \LogActivity::addToLog('Commune deleted');
            return response()->json(['status' => true, 'message' => "Commune deleted"]);
        }
    }
```
## Customers
Controlador: **CustomerController.php**
La consulta a todos los customers retornara un true y todos los customers que no tengan el valor "trash" en status

Código de **CustomerController.php**:
```
public function index()
    {
        $customers = Customer::select('customers.name', 'customers.last_name', 'customers.address','regions.description', 'communes.description')
            ->join('regions', 'customers.fk_reg', '=', 'regions.id_reg')
            ->join('communes', 'customers.fk_com', '=', 'communes.id_com')
            ->where('customers.status','!=', 'trash')
            ->get();
        \LogActivity::addToLog('Customers requested');
        return response()->json(['status' => true, 'data' => $customers]);
    }
```
La consulta de un customer en especifico realizará una consulta donde se busque el registro que contenga el dni o email proporcionado

Código de **CustomerController.php**:
```
public function show($id)
    {
        $customer = Customer::select('customers.name', 'customers.last_name', 'customers.address','regions.description', 'communes.description')
            ->join('regions', 'customers.fk_reg', '=', 'regions.id_reg')
            ->join('communes', 'customers.fk_com', '=', 'communes.id_com')
            ->where('customers.status', 'A')
            ->where(function ($query) use ($id){
                $query->where('customers.dni', '=',$id)
                      ->orWhere('customers.email','=', $id);
            })
            ->get();
        \LogActivity::addToLog('Customers requested');
        return response()->json(['status' => true, 'data' => $customer]);
    }
```
Para registrar nuevos customers se realiza una validación a través del Middlaware **CustomerValidation.php**
En el Middlaware **CustomerValidation.php** se validará lo siguiente:
    dni: debe ser obligatorio, de tipo string, con una longitud máxima de 45 y deberá ser único en la tabla customers
    region: debe ser obligatorio, de tipo integer y deberá existir en la tabla regions
    commune: debe ser obligatoria, de tipo integer y deberá existir en la tabla communes, también se validará que la región ingresada se relacione con la commune ingresada
    email: debe ser obligatorio, de tipo string, formato email, con una longitud máxima de 120 caracteres y deberá ser único en la tabla customers
    name: debe ser requerido, de tipo string y con una longitud máxima de 45 caracteres
    last_name: debe ser requerido, de tipo string y con una longitud máxima de 45 caracteres
    address: podrá ser nulo, debe ser de tipo string y con una longitud máxima de 255 caracteres

Código de **CustomerValidation.php**:
```
public function handle(Request $request, Closure $next)
    {
        $region = $request->region;
        $validator = Validator::make($request->all(),[
            'dni' => 'required|string|max:45|unique:customers',
            'region' => 'required|integer|exists:regions,id_reg',
            'commune' => [
                'integer',                                                                  
                'required',                                                            
                Rule::exists('communes', 'id_com')                     
                ->where('fk_reg', $region)                                                                   
            ],
            'email' => 'required|string|email|max:120|unique:customers',
            'name' => 'required|string|max:45',
            'last_name' => 'required|string|max:45',
            'address' => 'nullable|string|max:255',
            
        ]);

        if($validator->fails()){
            \LogActivity::addToLog($validator->errors());
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        return $next($request);
    }
```
Código de **CustomerController.php**:
```
public function store(Request $request)
    {
        $datetime = Carbon::now();
        $customer = Customer::create([
            'dni' => $request->dni,
            'fk_reg' => $request->region,
            'fk_com' => $request->commune,
            'email' => $request->email,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'date_reg' => $datetime
        ]);
        \LogActivity::addToLog('New customer added');
        return response()->json(['status' => true, 'data' => $customer]);
    }
```
Para la eliminación de un Customer primero se buscará el registro y se validará que el campo status no sea "trash", si esta condición se cumple se cambiará el valor de status a "trash" para eliminarlo de manera lógica, se retornará un true y el mensaje "Customer deleted successfully". En caso de ya tener el valor "trash" se retornará un false y el mensaje "Customer doesn't exist".

Código de **CustomerController.php**:
```
public function destroy(Request $request)
    {
        $customer = Customer::find($request->id);
        if($customer['status'] == 'A' || $customer['status'] == 'I'){
            Customer::find($request->id)->update(['status' => 'trash']);
            \LogActivity::addToLog('Customers deleted successfully');
            return response()->json(['status' => true, 'message' => "Customer deleted successfully"]);
        }elseif($customer['status'] == 'trash'){
            \LogActivity::addToLog("Customer doesn't exist");
            return response()->json(['status' => false, 'message' => "Customer doesn't exist"]);
        }
    }
```
## Token
La función para generar el token se encuentra en el modelo del usuario **Models/User.php**, esta función recibirá el nombre del token y el email del usuario con el que creará el token.
El token se conformará con el correo del usuario, la fecha y hora de creación y una cadena de caracteres aleatoria con una longitud entre 200 y 500 caracteres, todo esto se encriptará con SHA256 para mayor seguridad, tendrá un tiempo de vida de 60 minutos y se almacenará en la tabla personal_access_tokens.

Código de **User.php**:
```
public function createToken(string $name, string $email, array $abilities = ['*'])
    {
        $date = Carbon::now();
        $token = $this->tokens()->create([
            'name' => $name,
            'token' => hash('sha256', $plainTextToken = $email.$date.Str::random(rand(200,500))),
            'abilities' => $abilities,
        ]);

        return new NewAccessToken($token, $token->getKey().'|'.$plainTextToken);
    }
```
El token será obligatorio para acceder a las siguientes rutas:
Código de **api.php**:
```
    Route::get('logout', [AuthController::class, 'logout']);
    //regions routes
    Route::get('regions', [RegionController::class, 'index']);
    Route::post('region', [RegionController::class, 'store'])->middleware('region.validation');
    Route::delete('/region/{id}', [RegionController::class, 'destroy']);
    //communes routes
    Route::get('communes', [CommuneController::class, 'index']);
    Route::post('commune', [CommuneController::class, 'store'])->middleware('commune.validation');
    Route::delete('/commune/{id}', [CommuneController::class, 'destroy']);
    //customers routes
    Route::get('customers', [CustomerController::class, 'index']);
    Route::get('/customer/{id}', [CustomerController::class, 'show']);
    Route::post('customer', [CustomerController::class, 'store'])->middleware('customer.validation');
    Route::delete('/customer/{id}', [CustomerController::class, 'destroy']);
```
Al cerrar sesión todos los tokens activos o inactivos que haya generado el usuario se eliminarán.

Código de **AuthController.php**:
```
public function logout()
    {
        auth()->user()->tokens()->delete();
        \LogActivity::addToLog('You have successfully logged out and the token was successfully deleted');
        
        return response()
            ->json([
                'status' => true,
                'message' => 'You have successfully logged out and the token was successfully deleted'
            ]);
    }
```
## Logs
La lógica de los logs se encuentra en el archivo **Helpers/LogActivity.php**.
Los logs se guardarán en la tabla log_activities y se guardarán la siguiente información:
Mensaje del log, ej: registro de usuari, consulta de customer y los errores al realizar una operación.
La url en la cual ocurrió la actividad.
El método: GET, POST o DELETE.
La ip del cliente que realizó la actividad.
El agente.

Adicionalmente se realizará una validación en la cual se determine si la aplicación se encuentra en producción solo se registrarán los logs de los métodos POST y GET.

Código de **LogActivity.php**:
```
public static function addToLog($subject)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip'] = Request::ip();
    	$log['agent'] = Request::header('user-agent');
    	if(Request::isMethod('GET')){
            if (App::environment(['local', 'staging'])) {
                LogActivityModel::create($log);
            }
        }elseif(Request::isMethod('POST') || Request::isMethod('DELETE')){
            LogActivityModel::create($log);
        }    
    }
```
