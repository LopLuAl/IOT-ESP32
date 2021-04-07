
/* This sketch sends data via HTTP GET requests to esp8266-shop.com and returns the website in html format which is printed on the console */ 
#include <ESP8266WiFi.h> 
#include <Adafruit_Sensor.h>
#include <DHT.h>
#include <DHT_U.h>
#include "DHT.h"   

#define DHTPIN            2         // Pin which is connected to the DHT sensor.

// Uncomment the type of sensor in use:
#define DHTTYPE           DHT11     // DHT 11 
//#define DHTTYPE           DHT22     // DHT 22 (AM2302)
//#define DHTTYPE           DHT21     // DHT 21 (AM2301)
DHT dht(DHTPIN, DHTTYPE);
const char* ssid        = "Fz";
const char* password    = "xxxxx";
const char* host        = "iotet12.000webhostapp.com";
void setup() { Serial.begin(115200); delay(10); // We start by connecting to a WiFi network Serial.println();
Serial.println(); Serial.print("Connecting to ");
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
Serial.println("WiFi connected"); Serial.println("IP address: "); Serial.println(WiFi.localIP()); 
} int value = 0; 
void loop() { 
   dht.begin();
    float h = dht.readHumidity();
    float t = dht.readTemperature();
    float lux = 0;
delay(5000); ++value; 
Serial.print("connecting to ");
Serial.println(host); // Use WiFiClient class to create TCP connections
WiFiClient client;
const int httpPort =80;
if (!client.connect(host, httpPort)) {
Serial.println("connection failed");
return;
}
// We now create a URI for the request
//this url contains the informtation we want to send to the server
//if esp8266 only requests the website, the url is empty
String  url = "/sensores.php?temp=" + String(t) + "&hum="+ String(h)+"&id=1"+"&lux="+String(lux);
//url = "/sensores.php/?temp=7&hum=7&id=1&lux=7";

/* url += "?param1=";
url += param1;
url += "?param2=";
url += param2;
*/
Serial.print("Requesting URL: ");
Serial.println(url); // This will send the request to the server
client.print(String("GET ") + url + " HTTP/1.1\r\n" + "Host: " + host + "\r\n" + "Connection: close\r\n\r\n");
unsigned long timeout = millis();
while (client.available() == 0) {
if (millis() - timeout > 5000)
{ Serial.println(">>> Client Timeout !");
client.stop(); return; } } // Read all the lines of the reply from server and print them to Serial
while (client.available())
{ String line = client.readStringUntil('\r'); Serial.print(line);
}
Serial.println();
Serial.println("closing connection"); }
