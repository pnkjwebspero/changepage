import AuthContext from "./Store/auth.context.jsx";

<Button
    variant="contained"
    onClick={() => {
        authContext?.auth?.actor ? logout() : login();
    }}
>
    {authContext?.auth?.actor 
        ? "Log out" 
        : "Log Into Wallet"}
</Button>