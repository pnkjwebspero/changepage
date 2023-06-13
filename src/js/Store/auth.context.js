import { createContext, useState } from "react";
import ProtonWebSDK from "@proton/web-sdk";
import config from "../Config";
import Logo from "../../images/drone-with-box.svg";

/*****************Default auth context value and function */
const AuthContext = createContext({
    login: () => {},
    logout: () => {},
    setBalance: (balance) => {},
    setSession: (session) => {},
    setLink: (link) => {},
    setAuth: (auth) => {},
    restoreSession: () => {},
    balance: [],
    link: {},
    auth: {},
    session: {},
    isLogin: false,
});

/***************Style for webauth wallet */
const customStyleOptions = {
    modalBackgroundColor: "#2946b1",
    logoBackgroundColor: "#00203F",
    isLogoRound: true,
    optionBackgroundColor: "#00203F",
    optionFontColor: "#b4b4b4",
    primaryFontColor: "white",
    secondaryFontColor: "#acacac",
    linkColor: "#FF771D",
};

export function AuthContextProvider({ children }) {
    const [session, setSession] = useState(null);
    const [link, setLink] = useState(null);
    const [auth, setAuth] = useState(null);
    const [balance, setBalance] = useState(null);
    const [isLogin, setIsLogin] = useState(false);

    /******************Login webauth wallet */
    const login = async () => {
        try {
            const { link, session } = await ProtonWebSDK({
                linkOptions: {
                    chainId: config.CHAIN_ID,
                    endpoints: config.CHAIN_NETWORK_ENDPOINTS.split(","),
                },
                transportOptions: {
                    requestAccount: config.ACCOUNT,
                    backButton: true,
                },
                selectorOptions: {
                    appName: config.APP_NAME,
                    appLogo: Logo,
                    customStyleOptions,
                },
            });
            setAuth(session.auth);
            setLink(link);
            setSession(session);
            setIsLogin(true);
        } catch (e) {
            console.log("e", e);
        }
    };

    /*****************Restore webauth wallet session */
    const restoreSession = async () => {
        try {
            const { link, session } = await ProtonWebSDK({
                linkOptions: {
                    chainId: config.CHAIN_ID,
                    endpoints: config.CHAIN_NETWORK_ENDPOINTS.split(","),
                    restoreSession: true,
                },
                transportOptions: {
                    requestAccount: config.ACCOUNT,
                },
                selectorOptions: {
                    appName: config.APP_NAME,
                    appLogo: Logo,
                    showSelector: false,
                },
            });
            if (session && link) {
                setAuth(session.auth);
                setLink(link);
                setSession(session);
                setIsLogin(true);
            }
        } catch (e) {}
    };

    /****************Logout webauth wallet */
    const logout = async () => {
        await link.removeSession(config.ACCOUNT, auth);
        setAuth(null);
        setLink(null);
        setSession(null);
        setIsLogin(false);
        localStorage.removeItem("proton-storage-user-auth"); //remove logged in user from localStorage
        localStorage.clear();
    };

    /************Context values and function */
    const contextValue = {
        login: login,
        logout: logout,
        setBalance: setBalance,
        setSession: setSession,
        setLink: setLink,
        setAuth: setAuth,
        restoreSession: restoreSession,
        balance: balance,
        link: link,
        auth: auth,
        session: session,
        isLogin: isLogin,
    };

    return (
        <AuthContext.Provider value={contextValue}>
            {children}
        </AuthContext.Provider>
    );
}

export default AuthContext;
