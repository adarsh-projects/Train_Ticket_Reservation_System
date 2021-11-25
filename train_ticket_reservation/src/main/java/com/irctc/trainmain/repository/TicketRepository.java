package com.irctc.trainmain.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.irctc.trainmain.model.Ticket;

public interface TicketRepository extends JpaRepository<Ticket, String>{

}
