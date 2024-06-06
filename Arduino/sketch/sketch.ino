//Sensores para monitoramento
#define pinSensorV 4
#define pinSensorF 10
#define pinSensorC 9
#define pinSensorM 8
String msg = "";

//Definições para ações automatizadas
#define led 12
#define alarme 11
#define lampada 7
#define luz A3

void setup() {
  Serial.begin(9600);
  while (true) {
    char signal = Serial.read();
    if (!Serial){
    ; // wait for serial port to connect. Needed for native USB port only
    }
    else if (signal == 'A'){
      // Envio da mensagem de inicialização
      Serial.print("Arduino Conectado\n");
      break;
    }
  }
  
  pinMode(pinSensorV, INPUT);
  pinMode(pinSensorF, INPUT);
  pinMode(pinSensorC, INPUT);
  pinMode(pinSensorM, INPUT);
  pinMode(luz, INPUT);
  pinMode(lampada, OUTPUT);
  pinMode(led, OUTPUT);
  pinMode(alarme, OUTPUT);
}

// técnica de modulação de largura de pulso (PWM - Pulse Width Modulation)
int intensidadeSom = 128; // Valor entre 0 (desligado) e 255 (máxima intensidade)

// Não estamos utilizando a lâmpada e o fotoresistor ('luz'), pois o fotoresistor só envia 0
void loop() {


  if (digitalRead(pinSensorV) == HIGH || digitalRead(pinSensorF) == LOW || digitalRead(pinSensorM) == HIGH || digitalRead(pinSensorC) == LOW) {
    digitalWrite(led, HIGH);
    analogWrite(alarme, intensidadeSom);
  } else {
    digitalWrite(led, LOW);
    analogWrite(alarme, 0);
  }
  
  delay(100);
    //if (Serial.read() == 'A'){
      msg = "senha_exe=a4XXFt";
      if (digitalRead(pinSensorV) == LOW) {
        msg += "&sensorV=Sensor de Vibracao&estadoV=DESLIGADO";
      } else {
        msg += "&sensorV=Sensor de Vibracao&estadoV=LIGADO";
      }
      if (digitalRead(pinSensorF) == HIGH) {
        msg += "&sensorF=Sensor de Fogo&estadoF=DESLIGADO";
      } else {
        msg += "&sensorF=Sensor de Fogo&estadoF=LIGADO";
      }
      if (digitalRead(pinSensorC) == HIGH) {
        msg += "&sensorC=Sensor de Chuva&estadoC=DESLIGADO";
      } else {
        msg += "&sensorC=Sensor de Chuva&estadoC=LIGADO";
      }
      if (digitalRead(pinSensorM) == LOW) {
        msg += "&sensorM=Sensor de Movimento&estadoM=DESLIGADO";
      } else {
        msg += "&sensorM=Sensor de Movimento&estadoM=LIGADO";
      }
      if (digitalRead(led) == LOW) {
        msg += "&sensorL=Alarme&estadoL=DESLIGADO";
      } else {
        msg += "&sensorL=Alarme&estadoL=LIGADO";
      }
      msg += "\n";
      Serial.print(msg);
    //}
}
