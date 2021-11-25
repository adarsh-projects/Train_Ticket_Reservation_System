package com.irctc.trainmain.controller;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.irctc.trainmain.model.Passanger;
import com.irctc.trainmain.model.SignUp;
import com.irctc.trainmain.model.Ticket;
import com.irctc.trainmain.model.Train;
import com.irctc.trainmain.model.TrainDetails;
import com.irctc.trainmain.repository.PassangerRepository;
import com.irctc.trainmain.repository.SignUpRepository;
import com.irctc.trainmain.repository.TicketRepository;
import com.irctc.trainmain.repository.TrainDetailsRepository;
import com.irctc.trainmain.repository.TrainRepository;

class SortList implements Comparator<Passanger>{
	@Override
	public int compare(Passanger o1, Passanger o2) {
		return (o1.getName()).compareTo(o2.getName());
	}	
}

@CrossOrigin(origins="*")
@RestController
@RequestMapping("/api")
public class TrainTicketController {
	
	@Autowired
	TicketRepository ticketres;
	
	@Autowired
	PassangerRepository passangerres;
	
	@Autowired
	TrainRepository trainres;
	
	@Autowired
	SignUpRepository signupres;
	
	@Autowired
	TrainDetailsRepository traindetres;
	
	@PostMapping("/signup")
	public ResponseEntity<SignUp> userSignUp(@RequestBody SignUp user){
		try {
			SignUp _signup = signupres.save(new SignUp(user.getEmail(), user.getPassword()));
			return new ResponseEntity<>(_signup, HttpStatus.CREATED);
		}catch(Exception e) {
			System.out.println(e);
			return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	
	@GetMapping("/login/{user}")
	public ResponseEntity<SignUp> userSignUp(@PathVariable("user") String user){
		try {
			int i = 0;
			List<SignUp> l = new ArrayList<>();
			signupres.findAll().forEach(l::add);
			for(i = 0; i < l.size(); i++) {
				String res = l.get(i).getEmail()+"_"+l.get(i).getPassword();
				if(res.equals(user)) {
					break;
				}
			}
			if(i < l.size()) {
				return new ResponseEntity<>(l.get(i), HttpStatus.OK);
			}else {
				return new ResponseEntity<>(null, HttpStatus.NOT_FOUND);
			}
		}catch(Exception e) {
			return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	
	@PostMapping("/tickets")
	public ResponseEntity<Ticket> saveTicket(@RequestBody Ticket ticket){
		try {
			
			Ticket _ticket = ticketres.save(new Ticket(ticket.getBook_ticket_date(), ticket.getPnr(), ticket.getTrain_number(), ticket.getTotal_ticket_price(), ticket.getSt_date()));
			return new ResponseEntity<>(_ticket, HttpStatus.CREATED);
		}catch(Exception e){
			return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	@GetMapping("/tickets/{pnr}")
	public ResponseEntity<Ticket> getTicket(@PathVariable("pnr") String pnr){
		try {
			Ticket ticket = ticketres.findById(pnr).get();
			return new ResponseEntity<>(ticket, HttpStatus.CREATED);
		}catch(Exception e) {
			return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	@DeleteMapping("/tickets/{pnr}")
	public ResponseEntity<HttpStatus> deleteTicket(@PathVariable("pnr") String pnr){
		Optional<Ticket> op = ticketres.findById(pnr);
		if(op.isPresent()) {
			passangerres.deleteById(pnr);
			ticketres.deleteById(pnr);
			return new ResponseEntity<>(HttpStatus.OK);
		}else {
			return new ResponseEntity<>(HttpStatus.NOT_FOUND);
		}
	}
	@PostMapping("/passanger")
	public ResponseEntity<List<Passanger>> savePassanger(@RequestBody List<Passanger> passangers){
		try {
			String str = passangers.get(0).getPnr();
			int ticket_price = ticketres.getById(str).getTotal_ticket_price();
			for(Passanger p: passangers) {
				
				int	fair = Passanger.getCalculatedFair(p.getAge(), p.getGender(), ticket_price);
				passangerres.save(new Passanger(p.getTrain_number(),p.getAge(), p.getName(), p.getGender(),p.getPnr(),fair));
			}
			return new ResponseEntity<>(passangers, HttpStatus.CREATED);
		}catch(Exception e) {
			System.out.println("ex: "+e);
			return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	@GetMapping("/passanger/{pnr}")
	public ResponseEntity<List<Passanger>> getPassanger(@PathVariable("pnr") String pnr){
		try {
			List<Passanger> l = passangerres.findAll();
			List<Passanger> _passanger = new ArrayList<>();
			for(Passanger l1: l) {
				if(l1.getPnr().equals(pnr)) {
					_passanger.add(l1);
				}
			}
			Collections.sort(_passanger, new SortList());
			return new ResponseEntity<>(_passanger, HttpStatus.OK);
		}catch(Exception e) {
			return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	@GetMapping("/passanger/trainnumber/{train_number}")
	public ResponseEntity<List<Passanger>> getTicketPnr(@PathVariable("train_number") String train_number){
		try {
			List<Passanger> listticket = new ArrayList<>();
			passangerres.findAll().forEach(listticket::add);
			List<Passanger> ticket = new ArrayList<>(); 
			for(Passanger t: listticket) {
				if((t.getTrain_number()).equals(train_number)) {
					ticket.add(t);
				}
			}
			return new ResponseEntity<>(ticket, HttpStatus.OK);
		}catch(Exception e) {
			return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	@PostMapping("/train")
	public ResponseEntity<Train> saveTrain(@RequestBody Train train){
		try {
			Train _train = trainres.save(new Train(train.getTrain_number(), train.getTicket_price(), train.getSource(), train.getDestinations(), train.getTrain_name(), train.getSt_date()));
			return new ResponseEntity<>(_train, HttpStatus.CREATED);
		}catch(Exception e) {
			return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	@GetMapping("/train")
	public ResponseEntity<List<Train>> getAllTrain(){
		try {
			List<Train> train = new ArrayList<>();
			trainres.findAll().forEach(train::add);
			return new ResponseEntity<>(train, HttpStatus.OK);
		}catch(Exception e) {
			return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	
	@GetMapping("/train/{train_number}")
	public ResponseEntity<Train> getTrainById(@PathVariable("train_number") String train_number){
		try {
			Train train = trainres.findById(train_number).get();
			return new ResponseEntity<>(train, HttpStatus.OK);
		}catch(Exception e) {
			return new ResponseEntity<>(null, HttpStatus.NOT_FOUND);
		}
	}

	
	@GetMapping("/train/only/{source_destination}")
	public ResponseEntity<List<Train>> getTrainBysourc_destination(@PathVariable("source_destination") String source_destination ){
		try {
			List<Train> train = new ArrayList<>();
			List<Train> restrain = new ArrayList<>();
			trainres.findAll().forEach(train::add);
			for(Train t: train) {
				if((t.getSource()+"_"+t.getDestinations()).equals(source_destination)) {
					restrain.add(t);
				}
			}
			return new ResponseEntity<>(restrain, HttpStatus.OK);
		}catch(Exception e) {
			return new ResponseEntity<>(null, HttpStatus.NOT_FOUND);
		}
	}
	@PutMapping("/train/{train_number}")
	public ResponseEntity<Train> updateTrain(@PathVariable("train_number") String train_number, @RequestBody Train train_u){
		Optional<Train> op = trainres.findById(train_number);
		if(op.isPresent()) {
			Train train_ = op.get();
			train_.setDestinations(train_u.getDestinations() == null ? train_.getDestinations() : train_u.getDestinations());
			train_.setSource(train_u.getSource() == null ? train_.getSource() : train_u.getSource());
			train_.setTicket_price(train_u.getTicket_price() == 0 ? train_.getTicket_price() : train_u.getTicket_price());
			train_.setTrain_number(train_u.getTrain_number() == null ? train_.getTrain_number() : train_u.getTrain_number());
			train_.setSt_date(train_u.getSt_date() == null ? train_.getSt_date() : train_u.getSt_date());
			trainres.save(train_);
			return new ResponseEntity<>(HttpStatus.OK);
		}else {
			return new ResponseEntity<>(HttpStatus.NOT_FOUND);
		}
	}
	@DeleteMapping("/train/{train_number}")
	public ResponseEntity<HttpStatus> deleteTrain(@PathVariable("train_number") String train_number){
		Optional<Train> op = trainres.findById(train_number);
		if(op.isPresent()) {
			trainres.deleteById(train_number);
			return new ResponseEntity<>(HttpStatus.OK);
		}else {
			return new ResponseEntity<>(HttpStatus.NOT_FOUND);
		}
	}
	
	@PostMapping("/traindetails")
	public ResponseEntity<TrainDetails> saveTrainDetails(@RequestBody TrainDetails trainDetails){
		try {
			TrainDetails _trainDetails = traindetres.save(new TrainDetails(trainDetails.getTrain_number(), trainDetails.getDepart_date()
													, trainDetails.getArrive_date(), trainDetails.getArrive_time()
													, trainDetails.getDepart_time(), trainDetails.getRuns_on()));

			return new ResponseEntity<>(_trainDetails, HttpStatus.CREATED);
		}catch(Exception e) {
			System.out.println(e);
			return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	
	@GetMapping("/traindetails/{train_number}")
	public ResponseEntity<TrainDetails> getTrainDetails(@PathVariable("train_number") String train_number){
		try {
			TrainDetails _trainDetails = traindetres.findById(train_number).get();
			return new ResponseEntity<>(_trainDetails, HttpStatus.OK);
		}catch(Exception e) {
			return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
		}
	}
	
	@PutMapping("/traindetails/{train_number}")
	public ResponseEntity<TrainDetails> updateTrainDetails(@PathVariable("train_number") String train_number, @RequestBody TrainDetails train_u){
		Optional<TrainDetails> op =	traindetres.findById(train_number);
		if(op.isPresent()) {
			TrainDetails traindetails_ = op.get();
			traindetails_.setTrain_number(train_u.getTrain_number() == null ? traindetails_.getTrain_number() : train_u.getTrain_number());
			traindetails_.setArrive_date(train_u.getArrive_date() == null ? traindetails_.getArrive_date() : train_u.getArrive_date());
			traindetails_.setArrive_time(train_u.getArrive_time() == null ? traindetails_.getArrive_time() : train_u.getArrive_time());
			traindetails_.setDepart_date(train_u.getDepart_date() == null ? traindetails_.getDepart_date() : train_u.getDepart_date());
			traindetails_.setDepart_time(train_u.getDepart_time() == null ? traindetails_.getDepart_time() : train_u.getDepart_time());
			traindetails_.setRuns_on(train_u.getRuns_on() == null ? traindetails_.getRuns_on() : train_u.getRuns_on());
			traindetres.save(traindetails_);
			return new ResponseEntity<>(traindetails_,HttpStatus.OK);
		}else {
			return new ResponseEntity<>(null, HttpStatus.NOT_FOUND);
		}
	}
	@DeleteMapping("/traindetails/{train_number}")
	public ResponseEntity<HttpStatus> deleteTrainDetails(@PathVariable("train_number") String train_number){
		Optional<TrainDetails> op = traindetres.findById(train_number);
		if(op.isPresent()) {
			traindetres.deleteById(train_number);
			return new ResponseEntity<>(HttpStatus.OK);
		}else {
			return new ResponseEntity<>(HttpStatus.NOT_FOUND);
		}
	}
	
}
