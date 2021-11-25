package com.irctc.trainmain.model;


import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name="ticket")
public class Ticket {
	
	@Id
	@Column(name="pnr")
	private String pnr;
	
	@Column(name="train_number")
	private String train_number;
	
	@Column(name="book_ticket_date")
	private String book_ticket_date;
	
	@Column(name="st_date")
	private String st_date;
		
	@Column(name="total_ticket_price")
	private int total_ticket_price;
	
	public Ticket(){}
	
	public Ticket(String book_ticket_date, String pnr, String train_number, int total_ticket_price, String st_date) {
		super();
		this.book_ticket_date = book_ticket_date;
		this.pnr = pnr;
		this.train_number = train_number;
		this.total_ticket_price = total_ticket_price;
		this.st_date = st_date;
	}
	
	public String getBook_ticket_date() {
		return book_ticket_date;
	}

	public void setBook_ticket_date(String book_ticket_date) {
		this.book_ticket_date = book_ticket_date;
	}

	public String getSt_date() {
		return st_date;
	}

	public void setSt_date(String st_date) {
		this.st_date = st_date;
	}

	public String getPnr() {
		return pnr;
	}
	public void setPnr(String pnr) {
		this.pnr = pnr;
	}
	public String getTrain_number() {
		return train_number;
	}
	public void setTrain_number(String train_number) {
		this.train_number = train_number;
	}
	public int getTotal_ticket_price() {
		return total_ticket_price;
	}
	public void setTotal_ticket_price(int total_ticket_price) {
		this.total_ticket_price = total_ticket_price;
	}
}