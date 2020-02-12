package main

import (
	//"fmt"
	"log"
	// "context"
	// "firebase.google.com/go"
  // "google.golang.org/api/option"
	"net/http"
)

func loadNewMessages(w http.ResponseWriter, r *http.Request){
	// sa := option.WithCredentialsFile("../../ahechat-91c01be9bd8b.json")
	// app, err := firebase.NewApp(context.Background(), nil, sa)
	
	// client, err := app.Firestore(context.Background())
	// if err != nil {
	// 	log.Fatalln(err)
	// }

	// if err := r.ParseForm(); err != nil {
	// 	fmt.Fprintf(w, "ParseForm() err: %v", err)
	// 	return
	// }

	// fmt.Print(r.FormValue("time"));

	// query, err := client.Collection("messages").Where("time", ">", r.FormValue("time"))
	// log.Print(query);

	// // for _, msg := range query{	
	// // }

	// newTime := query[len(query)-1]["time"]

	// data := &query{
	// 	time: newTime,
	// 	msg: query,
	// }

	// defer client.Close()
	//fmt.Print("{time: '2020-02-02T11:00:00.000000Z', msg{time: '2020-02-02T11:00:00.999999Z', text: 'LALALA', login: 'test'}}")
}

func main(){
	//http.HandleFunc("/", loadNewMessages)
	log.Println("{time: '2020-02-02T11:00:00.000000Z', msg{time: '2020-02-02T11:00:00.999999Z', text: 'LALALA', login: 'test'}}")
}