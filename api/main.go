package main

import (
    "fmt"
    "log"
    "net/http"
    "encoding/json"
    "encoding/xml"
    //"github.com/gorilla/mux"
    "reflect"
)

func getXML(url string) ([]byte, error) {
    resp, err := http.Get(url)
    if err != nil {
      return []byte{}, fmt.Errorf("GET error: %v", err)
    }
    defer resp.Body.Close()
  
    if resp.StatusCode != http.StatusOK {
      return []byte{}, fmt.Errorf("Status error: %v", resp.StatusCode)
    }
  
    data, err := ioutil.ReadAll(resp.Body)
    if err != nil {
      return []byte{}, fmt.Errorf("Read body: %v", err)
    }
  
    return data, nil
}

func fetchAll() {
    if xmlBytes, err := getXML("http://somehost.com/some.xml"); err != nil {
        log.Printf("Failed to get XML: %v", err)
    } else {
        var result myXMLstruct
        xml.Unmarshal(xmlBytes, &result)
    }
}

func homePage(w http.ResponseWriter, r *http.Request){
    fmt.Fprintf(w, "Welcome to the HomePage!")
}

func retriveRates() {
    opts := new(SDMWRequestOptions)
    gen := generateRequest(opts)
    fmt.Fprintf(w, "Gen req "+gen)
    //json.NewEncoder(w).Encode(Articles)
}

func handleRequests(w http.ResponseWriter, r *http.Request) {
    //myRouter := mux.NewRouter().StrictSlash(true)
    http.HandleFunc("/", homePage)
    http.HandleFunc("/test", retriveRates)
    log.Fatal(http.ListenAndServe(":9082", nil))
}

func main() {
    handleRequests()
}