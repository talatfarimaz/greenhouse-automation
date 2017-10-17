

void setup() {
  // put your setup code here, to run once:
  Serial1.begin(115200);
  Serial.begin(115200);

  ATkomut("AT+RST\r\n",2000,true);
  ATkomut("AT+CWMODE=1\r\n",2000,true);
  ATkomut("AT+CWJAP=\">->O\",\"yataydurancopadam38\"\r\n",8000,true);
  ATkomut("AT+CIPMUX=0\r\n",1000,true);
  ATkomut("AT+CIFSR\r\n",4000,true);
  //ATkomut("AT+CIPSERVER=1,80\r\n",4000,true);
   //ATkomut( "AT+CIPSTART=4,\"TCP\",\"192.168.0.16\",80\r\n",12000,true);
}

void loop() 
{
  // put your main code here, to run repeatedly:
 
 
    
       
     String cmd = "AT+CIPSTART=\"TCP\",\"192.168.0.16\",80\r\n";
    ATkomut(cmd,12000,true);
     
      String yolla  = "GET /add.php?";
     yolla+="kisi_id_sera=";
      yolla += "8";
   /* yolla += "&";
    yolla += "vana_durum=";
    yolla += "aptal";
    yolla += "&";
    yolla += "havalandirma_durum=";
     yolla += "aptal";
    yolla += "&";
    yolla += "nem_degerleri=";
     yolla += "aptal";
    yolla += "&";
    yolla += "sicaklik_deger=";
     yolla += "aptal";
    yolla += "&";
    yolla += "ruzgar_deger=";
     yolla += "aptal";*/
    yolla += " HTTP/1.1\r\nHost: 192.168.0.16\r\n\r\n\r\n";
    String cipsend = "AT+CIPSEND=";
    cipsend += yolla.length();
    cipsend+="\r\n";
      ATkomut(cipsend,3000,true);
     ATkomut(yolla,4000,true);
     String kapatma="AT+CIPCLOSE=";
     kapatma+=cmd.length();
     kapatma+="\r\n";
     ATkomut(kapatma,2000,true);
   

}

String ATkomut(String komut, const int sure, boolean durum)
{
  String gelen="";
  Serial1.print(komut);
  long int zaman = millis();
  while((zaman+sure)> millis())
  {
    while(Serial1.available())
    {
      char c = Serial1.read();
      gelen+=c;
    }
  }
  if(durum)
  {
    Serial.print(gelen);
  }
  return gelen;
}
