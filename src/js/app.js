import ReactDOM from "react-dom/client"
import Button from "./components/Button";
import { AuthContextProvider } from "./Store/auth.context.jsx";

ReactDOM.createRoot(document.getElementById("root")).render(
    // ReactDOM.createRoot(document.getElementsByClassName('proton')).render(
    <div  className={'proton'}>
        <AuthContextProvider>
            <Button/>
        </AuthContextProvider>
    </div>
);