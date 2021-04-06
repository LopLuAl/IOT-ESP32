#include <ESP8266WiFi.h> 
#include <DHT.h>


#define DHTPIN            2        
#define DHTTYPE           DHT11    
DHT dht(DHTPIN, DHTTYPE);

const char* ssid        = "Fibertel WiFi017 2.4GHz";
const char* password    = "0102017365";
//const char* ssid        = "Telecentro-6648";
//const char* password    = "tele-2347748";

const char* host        = "iotet12.000webhostapp.com";

void setup() 
{ 
  Serial.begin(115200);
  delay(10); // We start by connecting to a WiFi network Serial.println();
  Serial.println(); 
  Serial.print("Connecting to ");
  Serial.println(ssid);
  /* Explicitly set the ESP8266 to be a WiFi-client, otherwise, it by default, would try to act as both a client and an access-point and could cause network-issues with your other WiFi-devices on your WiFi-network. */
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected"); 
  Serial.println("IP address: "); 
  Serial.println(WiFi.localIP());



   pinMode(5,OUTPUT);
   pinMode(4,OUTPUT);
   pinMode(0,OUTPUT);  
 } 


void sensores(void);
void actuadores(void);

void loop() 
{ 
  actuadores();
  //delay(300);
 
}
void actuadores()
{

  WiFiClient client;
   String line,datos;
   int cont = 0;
  Serial.print("connecting to ");
  Serial.println(host); // Use WiFiClient class to create TCP connections
 
  const int httpPort =80;
  if (!client.connect(host, httpPort)) 
  {
    Serial.println("connection failed");
    return;
  }
  String  url = "/LEDstate.txt";
  int buf;
  int led_0,led_1,led_2;
  Serial.print("Requesting URL: ");
  Serial.println(url); // This will send the request to the server
  client.print(String("GET ") + url + " HTTP/1.1\r\n" + "Host: " + host + "\r\n" + "Connection: close\r\n\r\n");
  unsigned long timeout = millis();
  while (client.available() == 0) 
  {
    if (millis() - timeout > 5000)
    { 
      Serial.println(">>> Client Timeout !");
      client.stop(); 
      return; 
    } 
  } // Read all the lines of the reply from server and print them to Serial
    while (client.available())
    { 
      line = client.readStringUntil('\r');
      if(cont == 1)
      { /*
        Serial.println(line[2]) ;
        Serial.println(line[3]) ;
        Serial.println(line[4]) ;
        */
        led_0=line[2]-48;
        led_1=line[3]-48;
        led_2=line[4]-48;
        cont = 0 ;
        break;
      }
      if (line == "\n") 
         cont = 1;
    }
    Serial.println(led_0);   
    Serial.println(led_1);   
    Serial.println(led_2);   
    Serial.println("closing connection");


    if(led_0 == 1)
      digitalWrite(5,HIGH);    
    else
      digitalWrite(5,LOW);

    if(led_1 == 1)
      digitalWrite(4,HIGH);    
    else
      digitalWrite(4,LOW);

    if(led_2 == 1)
      digitalWrite(0,HIGH);    
    else
      digitalWrite(0,LOW);
}


void sensores()
{
  
  dht.begin();
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  float lux = 0;
  WiFiClient client;
   
  Serial.print("connecting to ");
  Serial.println(host); // Use WiFiClient class to create TCP connections
 
  const int httpPort =80;
  if (!client.connect(host, httpPort)) 
  {
    Serial.println("connection failed");
    return;
  }
  String  url = "/sensores.php?temp=" + String(t) + "&hum="+ String(h)+"&id=1"+"&lux="+String(lux);
  //   url = "/sensores.php/?temp=7&hum=7&id=1&lux=7";
  
  Serial.print("Requesting URL: ");
  Serial.println(url); // This will send the request to the server
  client.print(String("GET ") + url + " HTTP/1.1\r\n" + "Host: " + host + "\r\n" + "Connection: close\r\n\r\n");
  Serial.println("closing connection");
 
}
