#include <SoftwareSerial.h>

SoftwareSerial mySerial(10, 11); // RX, TX

void setup() {
  Serial.begin(9600);
  Serial.flush();
  mySerial.begin(9600);
}

void loop() {
  char buffer[100];
  int index = 0;
  
  while(true) {
    char a = mySerial.read();
    if(a == '\n') {
      buffer[index++] = 0;
      break;
    } else if(a != -1) { 
      buffer[index++] = a;
    }
  }
  
  Serial.println(buffer);
  //Serial.flush();
  delay(1000);
}
