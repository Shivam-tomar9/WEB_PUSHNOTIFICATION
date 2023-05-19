importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js');

var firebaseConfig = {
    apiKey: "AIzaSyAaqt6sYiR3jeV7C783z29a20rT_VjF7dc",
    authDomain: "web-push-notification-sw-c9061.firebaseapp.com",
    projectId: "web-push-notification-sw-c9061",
    storageBucket: "web-push-notification-sw-c9061.appspot.com",
    messagingSenderId: "1044045181651",
    appId: "1:1044045181651:web:75bc04c8edaddc438f5a26",
    measurementId: "G-3MGRWGXDWT"
};

firebase.initializeApp(firebaseConfig);
const messaging=firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});