const checkPermission = () => {
    if (!('serviceWorker' in navigator)){
        throw new Error("Nenhum suporte para service workers")
    }

    if (!('Notification' in window)){
        throw new Error("Nenhum suporte à API de notificação");
    }
}

const registerSW = async () => {
    const registration = await navigator.serviceWorker.register('sw.js');
    return registration;
}

const requestNotification = async () => {
    const permission = await Notification.requestPermission();
    if (permission !== 'granted'){
        throw new Error("O usuário negou a permissão para mostrar notificações");
    } else {
        new Notification("Obrigado por aceitar nossas notificações!", {
            body: "Você receberá alarmes de segurança.",
        })
    }
}

checkPermission()
registerSW()
requestNotification()