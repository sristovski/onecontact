Hello {{$person->First_name}} {{$person->Last_Name}}
Thank you for create an account. Please verify your email using this link: 
{{route('verify', $person->email_token)}}