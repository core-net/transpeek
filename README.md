Transpeek is an IOT product developed by CORE.NET that is used to retrieve coordinates(latitude and longitude) in realtime which will be implemented in public transportation. The coordinates sent by transpeek can by used for multi purpose and access from many platform such as apps, web-apps, sms notification, and many others.
By using transpeek, it solves our huge problem as a public transportation users. 

Problems that will be solved:
- we can track where the public transportation in realtime
- the government will know how the distribution of their public transportation and make it even more efficiently and effectively
- save your time in waiting public transportation by giving you advice or notification when will be the correct time

In our current (first) development phase, here the informations that you have to know:
-  Hardware that we used:
      - Smartphone - Android  : as GPS locator
      - Arduino Uno           : main board
      - Router - TP-Link      : to send data to the internet
      - HC-05 Bluetooth Module: to communicate between Arduino and smartphone
-  Software that we used:
      - SensoDuino            : an Android app that is used to retrieve all the sensors that Android device had. In this case we only use GPS
      - Arduino IDE
-  How it works - part SensoDuino, Arduino, HC-05 Bluetooth module (more info check refferal):
      1.Implement Arduino Uno and HC-05 Bluetooth module
      2. Connect your Arduino to the laptop
      3. Upload your program to Arduino then open the Serial Monitor on your Arduino IDE
      4. Connect your Android device and HC-05 Bluetooth module via bluetooth paring. Once it is paired, the HC-05 Bluetooth module LED will be blinking once per second
      5. Once it's connected, run your SensoDuino
      6. Check GPS sensor at ON and TX checked box
      7. Connect your SensoDuino to HC-05 Bluetooth module via bluetooth. Once it is paired, the HC-05 Bluetooth module LED will be blinking twice per second
      8. Check the output on Serial Monitor, when it shows you your current GPS Location from your Android device, then it works
      9. Store the output to the local-database that you want, e.g result.txt
      10.Split the latitude and longitude that you retrieve then store it to your database
      
Refference:
http://www.techbitar.com/sensoduino.html

You may contribute in Transpeek development and using our Transpeek at your applications, web-apps, sms notification, and please credit us, CORE.NET.
If you have some question, feel free to contact us at:
- Email   : muhammad.firza.p@gmail.com
- Website : http://transpeek.com
